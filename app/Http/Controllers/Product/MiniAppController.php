<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use App\Services\HostService;
class MiniAppController extends Controller
{
      protected $hostService;
     public function __construct(HostService $hostService){
        $this->hostService = $hostService;
    }
      public function index()
    {
        session(['activeMenu'=>' Mini App']);
        return view('contents.mini_apps.index');
    }
    public function getProductByCustID(){
        $payload=[
            "subscriberId"=>request()->customer_id,
        ];
        $response = Http::withToken('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWUsImlhdCI6MTUxNjIzOTAyMn0.A5vysuv6cqVWuxLz4VBn6loiaWbe5c-Am2dcTDO88hA')
                    ->post($this->hostService->GetUrl('m').'/v1/utils/getproductByReference', $payload)->json();
                    if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
                        return response()->json(['error' => 'Invalid API response format or data type'], 500);
                    }
        $response = $response['result'];
        $response = $response['data'];
          $filter=[
            "id"=>0,
            "product_name"=>"",
            "product_code"=>"",
            "product_reference_id"=>0,
            "product_reference_name"=>"",
            "product_reference_code"=>$response['productReferenceCode'],
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
        $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/getProductSegment', $payload)->json();
        // dd($response);
        
        if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
            return response()->json(['error' => 'Invalid API response format or data type'], 500);
        }
        $response = $response['result'];

        $dt=[
            "draw"=> 1,
            "recordsTotal"=> $response['records_total'],
            "recordsFiltered"=> $response['records_filtered'],
            "data"=> $response['data'],
        ];
        return response()->json($dt);
    }
    public function inquiry(Request $request){
        // dd($request->all());
        $noref=  'TRX-' . now()->format('YmdHis') . '-' . mt_rand(1000, 9999);
        $payload=[
            "product_code"=>$request->product_code,
            "reference_number_merchant"=>$noref,
            "customer_id"=>$request->customer_id,
            "periode"=>"",
        ];
        $response = Http::withToken('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWUsImlhdCI6MTUxNjIzOTAyMn0.A5vysuv6cqVWuxLz4VBn6loiaWbe5c-Am2dcTDO88hA')
                ->post($this->hostService->GetUrl('m').'/v1/inquiry', $payload)->json();
        // dd($response);
        
        if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
            return response()->json(['error' => 'Invalid API response format or data type'], 500);
        }
        // $response = $response['result'];
        return response()->json($response);
    }
    public function payment(Request $request){
        $payload=[
            "reference_number_merchant"=>$request->reference_number_merchant,
            "reference_number"=>$request->reference_number,
        ];
        $response = Http::withToken('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWUsImlhdCI6MTUxNjIzOTAyMn0.A5vysuv6cqVWuxLz4VBn6loiaWbe5c-Am2dcTDO88hA')
                ->post($this->hostService->GetUrl('m').'/v1/payment', $payload)->json();
        // dd($response);
        
        if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
            return response()->json(['error' => 'Invalid API response format or data type'], 500);
        }
        // $response = $response['result'];
        return response()->json($response);
    }
}
