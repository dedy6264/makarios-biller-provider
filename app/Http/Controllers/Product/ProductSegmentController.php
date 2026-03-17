<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use App\Services\HostService;
class ProductSegmentController extends Controller
{
     protected $hostService;
     public function __construct(HostService $hostService){
        $this->hostService = $hostService;
    }
     public function index()
    {
        $filter=[
            "id"=>0,
            "provider_name"=>"",
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
        $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/getProvider', $payload)->json();
        if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
            return response()->json(['error' => 'Invalid API response format or data type'], 500);
        }
        $response = $response['result'];
        $providers=$response['data'];
         $filter=[
            "id"=>0,
            "segment_name"=>"",
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
        $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/getSegment', $payload)->json();
        if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
            return response()->json(['error' => 'Invalid API response format or data type'], 500);
        }
        $response = $response['result'];
        $segments=$response['data'];
    
        $filter=[
            "id"=>0,
            "product_type_name"=>"",
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
        $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/getProductType', $payload)->json();
        if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
            return response()->json(['error' => 'Invalid API response format or data type'], 500);
        }
        $response = $response['result'];
        $product_types=$response['data'];
       
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
        $products=$response['data'];
        session(['activeMenu'=>'Product Segment']);
        return view('contents.products.product_segments.index', compact('providers','segments','product_types','products'));
    }

    public function getAll(){
       $filter=[
            "id"=>0,
            "provider_id"=>0,
            "provider_name"=>"",
            "product_provider_name"=>"",
            "product_provider_code"=>"",
            "product_provider_price"=>0,
            "product_provider_admin_fee"=>0,
            "product_provider_merchant_fee"=>0,
            "segment_id"=>0,
            "segment_name"=>"",
            "product_reference_id"=>0,
            "product_reference_name"=>"",
            "product_reference_code"=>"",
            "product_category_id"=>0,
            "product_category_name"=>"",
            "product_provider_id"=>0,
            "product_type_id"=>0,
            "product_type_name"=>"",
            "product_id"=>0,
            "product_name"=>"",
            "product_code"=>"",
            "product_price"=>0,
            "product_admin_fee"=>0,
            "product_merchant_fee"=>0,
            // "product_availability"=>"",
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
        $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/getProductSegment', $payload)->json();
        // dd($response);
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
        // dd(request()->all());
        $request->validate([
            'provider_id' => 'required|integer|max:100',
            'provider_name' => 'required|string|max:100',
            'product_provider_name' => 'required|string|max:100',
            'product_provider_code' => 'required|string|max:100',
            'segment_id'=> 'required|integer|max:100',
            'segment_name'=> 'required|string|max:100',
            'product_reference_id'=> 'required|integer|max:100',
            'product_reference_name'=> 'required|string|max:100',
            'product_reference_code'=> 'required|string|max:100',
            'product_category_id'=> 'required|integer|max:100',
            'product_category_name'=> 'required|string|max:100',
            'product_provider_id'=> 'required|integer|max:100',
            'product_type_id'=> 'required|integer|max:100',
            'product_type_name'=> 'required|string|max:100',
            'product_id'=> 'required|integer|max:100',
            'product_name'=> 'required|string|max:100',
            'product_code'=> 'required|string|max:100',
            // 'product_availability'=> 'required|string|max:100',
        ]);
        try {
            $payload=[
                "provider_id"=>(int)$request->provider_id,
                "provider_name"=>strtoupper($request->provider_name),
                "product_provider_name"=>strtoupper($request->product_provider_name),
                "product_provider_code"=>strtoupper($request->product_provider_code),
                "product_provider_price"=>(double)$request->product_provider_price,
                "product_provider_admin_fee"=>(double)$request->product_provider_admin_fee,
                "product_provider_merchant_fee"=>(double)$request->product_provider_merchant_fee,
                "segment_id"=>(int)$request->segment_id,
                "segment_name"=>$request->segment_name,
                "product_reference_id"=>(int)$request->product_reference_id,
                "product_reference_name"=>strtoupper($request->product_reference_name),
                "product_reference_code"=>strtoupper($request->product_reference_code),
                "product_category_id"=>(int)$request->product_category_id,
                "product_category_name"=>strtoupper($request->product_category_name),
                "product_provider_id"=>(int)$request->product_provider_id,
                "product_type_id"=>(int)$request->product_type_id,
                "product_type_name"=>strtoupper($request->product_type_name),
                "product_id"=>(int)$request->product_id,
                "product_name"=>strtoupper($request->product_name),
                "product_code"=>strtoupper($request->product_code),
                "product_price"=>(double)$request->product_price,
                "product_admin_fee"=>(double)$request->product_admin_fee,
                "product_merchant_fee"=>(double)$request->product_merchant_fee,

            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/addProductSegment', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('product_segments.index')->with('status', 'product-segment-created');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('product_segments.index')->with('status', 'product-segment-creation-failed');
        }
    }
     public function update(Request $request)
    {
        $request->validate([
            'id'=>'required|integer',
            'provider_id' => 'required|integer|max:100',
            'provider_name' => 'required|string|max:100',
            'product_provider_name' => 'required|string|max:100',
            'product_provider_code' => 'required|string|max:100',
            'segment_id'=> 'required|integer|max:100',
            'segment_name'=> 'required|string|max:100',
            'product_reference_id'=> 'required|integer|max:100',
            'product_reference_name'=> 'required|string|max:100',
            'product_reference_code'=> 'required|string|max:100',
            'product_category_id'=> 'required|integer|max:100',
            'product_category_name'=> 'required|string|max:100',
            'product_provider_id'=> 'required|integer|max:100',
            'product_type_id'=> 'required|integer|max:100',
            'product_type_name'=> 'required|string|max:100',
            'product_id'=> 'required|integer|max:100',
            'product_name'=> 'required|string|max:100',
            'product_code'=> 'required|string|max:100',
        ]);
        try {
            $payload=[
                "id"=>(int)$request->id,
                "provider_id"=>(int)$request->provider_id,
                "provider_name"=>strtoupper($request->provider_name),
                "product_provider_name"=>strtoupper($request->product_provider_name),
                "product_provider_code"=>strtoupper($request->product_provider_code),
                "product_provider_price"=>(double)$request->product_provider_price,
                "product_provider_admin_fee"=>(double)$request->product_provider_admin_fee,
                "product_provider_merchant_fee"=>(double)$request->product_provider_merchant_fee,
                "segment_id"=>(int)$request->segment_id,
                "segment_name"=>$request->segment_name,
                "product_reference_id"=>(int)$request->product_reference_id,
                "product_reference_name"=>strtoupper($request->product_reference_name),
                "product_reference_code"=>strtoupper($request->product_reference_code),
                "product_category_id"=>(int)$request->product_category_id,
                "product_category_name"=>strtoupper($request->product_category_name),
                "product_provider_id"=>(int)$request->product_provider_id,
                "product_type_id"=>(int)$request->product_type_id,
                "product_type_name"=>strtoupper($request->product_type_name),
                "product_id"=>(int)$request->product_id,
                "product_name"=>strtoupper($request->product_name),
                "product_code"=>strtoupper($request->product_code),
                "product_price"=>(double)$request->product_price,
                "product_admin_fee"=>(double)$request->product_admin_fee,
                "product_merchant_fee"=>(double)$request->product_merchant_fee,
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/updateProductSegment', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('product_segments.index')->with('status', 'product-segment-updated');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('product_segments.index')->with('status', 'product-segment-updated-failed');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $payload=[
                "id"=>(int)$request->id,
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/deleteProductSegment', $payload)->json();

            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('product_segments.index')->with('status', 'product-segment-deleted');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('product_segments.index')->with('status', 'product-segment-delete-failed');
        }
    }
}
