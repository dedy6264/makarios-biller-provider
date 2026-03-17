<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use App\Services\HostService;

class ProductProviderController extends Controller
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
        session(['activeMenu'=>'Product Provider']);
        return view('contents.products.product_providers.index', compact('providers'));
    }

    public function getAll(){
        // dd(request()->all());
       $filter=[
            "id"=>0,
            "provider_id"=>(int)request()->input('provider_id', 0),
            "provider_name"=>"",
            "product_provider_name"=>"",
            "product_provider_code"=>"",
            "product_provider_price"=>0,
            "product_provider_admin_fee"=>0,
            "product_provider_merchant_fee"=>0,
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
        $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/getProductProvider', $payload)->json();
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
            'provider_id' => 'required|integer|max:100',
            'provider_name' => 'required|string|max:100',
            'product_provider_name' => 'required|string|max:100',
            'product_provider_code' => 'required|string|max:100',
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
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/addProductProvider', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('product_providers.index')->with('status', 'category-created');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('product_providers.index')->with('status', 'category-creation-failed');
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
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/updateProductProvider', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('product_providers.index')->with('status', 'category-updated');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('product_providers.index')->with('status', 'category-updated-failed');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $payload=[
                "id"=>(int)$request->id,
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/deleteProductProvider', $payload)->json();

            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('product_providers.index')->with('status', 'category-deleted');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('product_providers.index')->with('status', 'category-delete-failed');
        }
    }
}
