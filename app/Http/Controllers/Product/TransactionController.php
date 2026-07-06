<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use App\Services\HostService;
class TransactionController extends Controller
{
    protected $hostService;
     public function __construct(HostService $hostService){
        $this->hostService = $hostService;
    }
    public function index()
    {
        session(['activeMenu'=>'Transactions']);
        return view('viller.content.transaction');
    }

    public function getAll(){
       $filter=[
            "id"=>0,
            "segment_name"=>"",
        ];
        $payload=[
            "start"=>0,
            "length"=>100,
            "columns"=>"",
            "search"=>"",
            "order"=>"updated_at",
            "sort"=>"desc",
            "start_date"=>"",
            "end_date"=>"",
            "filter"=>$filter,
        ];
        $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/transactionHistory', $payload)->json();
        if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
            return response()->json(['error' => 'Invalid API response format or data type'], 500);
        }
        $response = $response['result'];
        // $clients=$response['data'];

        $dt=[
            "draw"=> 1,
            "recordsTotal"=> $response['records_total'],
            "recordsFiltered"=> $response['records_filtered'],
            "data"=> $response['data']?? [],
        ];
        return response()->json($dt);
    }
   
}
