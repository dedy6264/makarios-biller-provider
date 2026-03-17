<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use App\Services\HostService;
class ProductCategoryController extends Controller
{
     protected $hostService;
     public function __construct(HostService $hostService){
        $this->hostService = $hostService;
    }
      public function index()
    {
        session(['activeMenu'=>'Product Category']);
        return view('contents.products.product_categories.index');
    }

    public function getAll(){
       $filter=[
            "id"=>0,
            "product_category_name"=>"",
        ];
        $payload=[
            "start"=>0,
            "length"=>0,
            "columns"=>"",
            "search"=>"",
            "order"=>"id",
            "sort"=>"asc",
            "start_date"=>"",
            "end_date"=>"",
            "filter"=>$filter,
        ];
        $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/getProductCategory', $payload)->json();
        if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
            return response()->json(['error' => 'Invalid API response format or data type'], 500);
        }
        $response = $response['result'];
        // $clients=$response['data'];

        $dt=[
            "draw"=> 1,
            "recordsTotal"=> $response['records_total'],
            "recordsFiltered"=> $response['records_filtered'],
            "data"=> $response['data'],
        ];
        return response()->json($dt);
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_category_name' => 'required|string|max:100',
        ]);
        try {
            $payload=[
                "product_category_name"=>strtoupper($request->product_category_name),
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/addProductCategory', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('product_categories.index')->with('status', 'category-created');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('product_categories.index')->with('status', 'category-creation-failed');
        }
    }
     public function update(Request $request)
    {
        $request->validate([
            'id'=>'required|integer',
            'product_category_name'    => 'required',
        ]);
        try {
            $payload=[
                "id"=>(int)$request->id,
                "product_category_name"=>strtoupper($request->product_category_name),
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/updateProductCategory', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('product_categories.index')->with('status', 'category-updated');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('product_categories.index')->with('status', 'category-updated-failed');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $payload=[
                "id"=>(int)$request->id,
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/deleteProductCategory', $payload)->json();

            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('product_categories.index')->with('status', 'category-deleted');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('product_categories.index')->with('status', 'category-delete-failed');
        }
    }
}
