<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

use App\Services\HostService;
class ClientController extends Controller
{
     protected $hostService;
     public function __construct(HostService $hostService){
        $this->hostService = $hostService;
    }
     public function index()
    {
        session(['activeMenu'=>'Hierarchy']);
        return view('viller.content.hierarchy');
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
        try {
            $request->validate([
                'client_name' => 'required|string|max:100',
            ]);
            $payload=[
                "client_name"=>strtoupper($request->client_name),
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/addClient', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                throw new \RuntimeException('Invalid API response format or data type');
            } 
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Client berhasil ditambahkan.',
                    'data' => $response['result'],
                ]);
            }
            return Redirect::route('clients.index')->with('status', 'client-created');
        } catch (ValidationException $th) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal.',
                    'errors' => $th->errors(),
                ], 422);
            }
            throw $th;
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Client gagal ditambahkan.',
                ], 422);
            }
            return Redirect::route('clients.index')->with('status', 'client-creation-failed');
        }
    }
     public function update(Request $request)
    {
        try {
            $request->validate([
                'id'=>'required|integer',
                'client_name'    => 'required',
            ]);
            $payload=[
                "id"=>(int)$request->id,
                "client_name"=>strtoupper($request->client_name),
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/updateClient', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                throw new \RuntimeException('Invalid API response format or data type');
            } 
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Client berhasil diperbarui.',
                    'data' => $response['result'],
                ]);
            }
            return Redirect::route('clients.index')->with('status', 'client-updated');
        } catch (ValidationException $th) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal.',
                    'errors' => $th->errors(),
                ], 422);
            }
            throw $th;
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Client gagal diperbarui.',
                ], 422);
            }
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
                throw new \RuntimeException('Invalid API response format or data type');
            } 
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Client berhasil dihapus.',
                ]);
            }
            return Redirect::route('clients.index')->with('status', 'client-deleted');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Client gagal dihapus.',
                ], 422);
            }
            return Redirect::route('clients.index')->with('status', 'client-delete-failed');
        }
    }
}
