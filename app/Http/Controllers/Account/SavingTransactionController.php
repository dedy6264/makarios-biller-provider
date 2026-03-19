<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use App\Services\HostService;
class SavingTransactionController extends Controller
{
    protected $hostService;
     public function __construct(HostService $hostService){
        $this->hostService = $hostService;
    }
    public function index()
    {
         $filter=[
            "id"=>0,
            "account_id"=>0,
            "account_name"=>"",
            "account_number"=>"",
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
        $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/getAccount', $payload)->json();
        if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
            return response()->json(['error' => 'Invalid API response format or data type'], 500);
        }
        $response = $response['result'];
        $accounts=$response['data'];
        session(['activeMenu'=>'Saving']);
        return view('contents.accounts.saving_transactions.index',compact('accounts'));
    }

    public function getAll(){
       $filter=[
            "id"=>0,
            "account_id"=>0,
            "account_name"=>"",
            "account_number"=>"",
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
        $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/savingTransaction', $payload)->json();
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
}
