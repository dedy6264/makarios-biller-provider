<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use App\Services\HostService;
class ProductController extends Controller
{
     protected $hostService;
     public function __construct(HostService $hostService){
        $this->hostService = $hostService;
    }
    public function index()
    {
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
        $product_categories=$response['data'];
        $filter=[
            "id"=>0,
            "product_reference_name"=>"",
            "product_reference_code"=>"",
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
        $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/getProductReference', $payload)->json();
        if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
            return response()->json(['error' => 'Invalid API response format or data type'], 500);
        }
        $response = $response['result'];
        $product_references=$response['data'];
        session(['activeMenu'=>'Product']);
        return view('contents.products.products.index', compact('product_categories','product_references'));
    }

    public function getAll(){
       $filter=[
            "id"=>0,
            "product_name"=>"",
            "product_code"=>"",
            "product_reference_id"=>0,
            "product_reference_name"=>"",
            "product_reference_code"=>"",
            "product_category_id"=>0,
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
        $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/getProduct', $payload)->json();
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
            'product_name' => 'required|string|max:100',
            'product_code' => 'required|string|max:100',
            'product_reference_id' => 'required|integer|max:100',
            'product_reference_name' => 'required|string|max:100',
            'product_reference_code' => 'required|string|max:100',
            'product_category_id' => 'required|integer|max:100',
            'product_category_name' => 'required|string|max:100',
        ]);
        try {
            $payload=[
                "product_name"=>strtoupper($request->product_name),
                "product_code"=>strtoupper($request->product_code),
                "product_reference_id"=>(int)$request->product_reference_id,
                "product_reference_name"=>strtoupper($request->product_reference_name),
                "product_reference_code"=>strtoupper($request->product_reference_code),
                "product_category_id"=>(int)$request->product_category_id,
                "product_category_name"=>strtoupper($request->product_category_name),
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/addProduct', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('products.index')->with('status', 'category-created');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('products.index')->with('status', 'category-creation-failed');
        }
    }
     public function update(Request $request)
    {
        $request->validate([
            'id'=>'required|integer',
           'product_name' => 'required|string|max:100',
            'product_code' => 'required|string|max:100',
            'product_reference_id' => 'required|integer|max:100',
            'product_reference_name' => 'required|string|max:100',
            'product_reference_code' => 'required|string|max:100',
            'product_category_id' => 'required|integer|max:100',
            'product_category_name' => 'required|string|max:100',
        ]);
        try {
            $payload=[
                "id"=>(int)$request->id,
                "product_name"=>strtoupper($request->product_name),
                "product_code"=>strtoupper($request->product_code),
                "product_reference_id"=>(int)$request->product_reference_id,
                "product_reference_name"=>strtoupper($request->product_reference_name),
                "product_reference_code"=>strtoupper($request->product_reference_code),
                "product_category_id"=>(int)$request->product_category_id,
                "product_category_name"=>strtoupper($request->product_category_name),
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/updateProduct', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('products.index')->with('status', 'category-updated');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('products.index')->with('status', 'category-updated-failed');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $payload=[
                "id"=>(int)$request->id,
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/deleteProduct', $payload)->json();

            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('products.index')->with('status', 'category-deleted');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('products.index')->with('status', 'category-delete-failed');
        }
    }
}
