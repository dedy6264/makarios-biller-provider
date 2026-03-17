<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

use App\Services\HostService;
class ClientController extends Controller
{
     protected $hostService;
     public function __construct(HostService $hostService){
        $this->hostService = $hostService;
    }
     public function index()
    {
        session(['activeMenu'=>'Client']);
        return view('contents.partners.clients.index');
    }
    public function getAll(){
       $filter=[
            "id"=>0,
            "client_name"=>"",
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
            'client_name' => 'required|string|max:100',
        ]);
        try {
            $payload=[
                "client_name"=>strtoupper($request->client_name),
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/addClient', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('clients.index')->with('status', 'client-created');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('clients.index')->with('status', 'client-creation-failed');
        }
    }
     public function update(Request $request)
    {
        $request->validate([
            'id'=>'required|integer',
            'client_name'    => 'required',
        ]);
        try {
            $payload=[
                "id"=>(int)$request->id,
                "client_name"=>strtoupper($request->client_name),
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/updateClient', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('clients.index')->with('status', 'client-updated');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('clients.index')->with('status', 'client-updated-failed');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $payload=[
                "id"=>(int)$request->id,
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/deleteClient', $payload)->json();

            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            } 
            return Redirect::route('clients.index')->with('status', 'client-deleted');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            return Redirect::route('clients.index')->with('status', 'client-delete-failed');
        }
    }
}
