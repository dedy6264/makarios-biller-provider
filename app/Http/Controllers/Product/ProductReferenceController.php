<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use App\Services\HostService;
class ProductReferenceController extends Controller
{
     protected $hostService;
     public function __construct(HostService $hostService){
        $this->hostService = $hostService;
    }
       public function index()
    {
        session(['activeMenu'=>'Product Reference']);
        return view('contents.products.product_references.index');
    }

    public function getAll(){
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
            'product_reference_name' => 'required|string|max:100',
            'product_reference_code' => 'required|string|max:100',
        ]);
        try {
            $payload=[
                "product_reference_name"=>strtoupper($request->product_reference_name),
                "product_reference_code"=>strtoupper($request->product_reference_code),
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/addProductReference', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('product_references.index')->with('status', 'reference-created');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('product_references.index')->with('status', 'reference-creation-failed');
        }
    }
     public function update(Request $request)
    {
        $request->validate([
            'id'=>'required|integer',
            'product_reference_name'    => 'required',
            'product_reference_code'    => 'required',
        ]);
        try {
            $payload=[
                "id"=>(int)$request->id,
                "product_reference_name"=>strtoupper($request->product_reference_name),
                "product_reference_code"=>strtoupper($request->product_reference_code),
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/updateProductReference', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('product_references.index')->with('status', 'reference-updated');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('product_references.index')->with('status', 'reference-updated-failed');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $payload=[
                "id"=>(int)$request->id,
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/deleteProductReference', $payload)->json();

            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('product_references.index')->with('status', 'reference-deleted');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('product_references.index')->with('status', 'reference-delete-failed');
        }
    }
}
