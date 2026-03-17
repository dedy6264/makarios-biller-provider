<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use App\Services\HostService;
class GroupController extends Controller
{
     protected $hostService;
     public function __construct(HostService $hostService){
        $this->hostService = $hostService;
    }
     public function index()
    {
         $filter=[
            "id"=>0,
            "client_name"=>"",
            "client_id"=>0,
            "group_name"=>"",
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
        $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/getClient', $payload)->json();
        if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
            return response()->json(['error' => 'Invalid API response format or data type'], 500);
        }
        $response = $response['result'];
        $clients=$response['data'];

        session(['activeMenu'=>'Group']);
        return view('contents.partners.groups.index',compact('clients'));
    }
    public function getAll(){

       $filter=[
            "id"=>0,
            "group_name"=>"",
            "client_id"=>(int)request()->input('client_id', 0),
            "client_name"=>"",
        ];
        // dd($filter);
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
        $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/getGroup', $payload)->json();
        if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
            return response()->json(['error' => 'Invalid API response format or data type'], 500);
        }
        $response = $response['result'];
        $groups=$response['data'];

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
            'group_name' => 'required|string|max:100',
            'client_id'=>'required|integer|max:100',
            'client_name'=>'required|string|max:100',
        ]);
        try {
            $payload=[
                "group_name"=>strtoupper($request->group_name),
                "client_id"=>(int)$request->client_id,
                "client_name"=>strtoupper($request->client_name),
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/addGroup', $payload)->json();
            // dd($response);
            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!="00") {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('groups.index')->with('status', 'group-created');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('groups.index')->with('status', 'group-creation-failed');
        }
    }
     public function update(Request $request)
    {
        $request->validate([
            'id'=>'required|integer',
            'group_name' => 'required|string|max:100',
             'client_id'=>'required|integer|max:100',
            'client_name'=>'required|string|max:100',
        ]);
        try {
            $payload=[
                "id"=>(int)$request->id,
                "group_name"=>strtoupper($request->group_name),
                 "client_id"=>(int)$request->client_id,
                "client_name"=>strtoupper($request->client_name),
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/updateGroup', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('groups.index')->with('status', 'group-updated');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('groups.index')->with('status', 'group-updated-failed');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $payload=[
                "id"=>(int)$request->id,
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/deleteGroup', $payload)->json();

            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('groups.index')->with('status', 'group-deleted');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('groups.index')->with('status', 'group-delete-failed');
        }
    }
}
