<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use App\Services\HostService;
class SavingAccountController extends Controller
{
     protected $hostService;
     public function __construct(HostService $hostService){
        $this->hostService = $hostService;
    }
    public function index()
    {
         $filter=[
            "id"=>0,
            "account_name"=>"",
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
        return view('contents.accounts.savings.index',compact('accounts'));
    }

    public function getAll(){
       $filter=[
            "id"=>0,
            "account_name"=>"",
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
        $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/getSavingAccount', $payload)->json();
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
        // dd($request->all());
        $request->validate([
            'account_name' => 'required|string|max:100',
            'account_id' => 'required|integer|max:100',
        ]);
        try {
            $payload=[
                "account_id"=>(int)$request->account_id,
                "account_name"=>strtoupper($request->account_name),
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/addSavingAccount', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('savings.index')->with('status', 'account-created');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('savings.index')->with('status', 'account-creation-failed');
        }
    }
     
    public function destroy(Request $request)
    {
        try {
            $payload=[
                "id"=>(int)$request->id,
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/deleteSavingAccount', $payload)->json();

            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('savings.index')->with('status', 'account-deleted');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('savings.index')->with('status', 'account-delete-failed');
        }
    }
}
