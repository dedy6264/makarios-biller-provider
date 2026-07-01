<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use App\Services\HostService;
class MerchantController extends Controller
{
     protected $hostService;
     public function __construct(HostService $hostService){
        $this->hostService = $hostService;
    }
      public function index()
    {
        $filter=["id"=>0,"client_name"=>"","group_id"=>0,"group_name"=>"","merchant_name"=>"",
        ];
        $payload=["start"=>0,"length"=>0,"columns"=>"","search"=>"","order"=>"id","sort"=>"asc","start_date"=>"","end_date"=>"","filter"=>$filter,
        ];
        $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/getClient', $payload)->json();
        if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
            return response()->json(['error' => 'Invalid API response format or data type'], 500);
        }
        $response = $response['result'];
        $clients=$response['data'];
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
        session(['activeMenu'=>'Hierarchy']);
        return view('contents.partners.merchants.index',compact('clients','segments'));
    }
    public function getAll(){
       $filter=[
            "id"=>0,
            "group_id"=>0,
            "group_name"=>"",
            "client_id"=>0,
            "client_name"=>"",
            "merchant_name"=>"",

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
        $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/getMerchant', $payload)->json();
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
        try {
            $request->validate([
                'group_name' => 'required|string|max:100',
                'group_id'=>'required|integer|max:100',
                'client_id'=>'required|integer|max:100',
                'client_name'=>'required|string|max:100',
                'merchant_name'=>'required|string|max:100',
                'segment_id'=>'required|integer|max:100',
                'segment_name'=>'required|string|max:100',
            ]);
            $payload=[
                "merchant_name"=>strtoupper($request->merchant_name),
                "group_id"=>(int)$request->group_id,
                "group_name"=>strtoupper($request->group_name),
                "client_id"=>(int)$request->client_id,
                "client_name"=>strtoupper($request->client_name),
                "segment_id"=>(int)$request->segment_id,
                "segment_name"=>strtoupper((string)$request->segment_name),
                "first_name"=>strtoupper((string)$request->first_name),
                "last_name"=>strtoupper((string)$request->last_name),
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/addMerchant', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!="00") {
                throw new \RuntimeException('Invalid API response format or data type');
            } 
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Merchant berhasil ditambahkan.',
                    'data' => $response['result'],
                ]);
            }
            return Redirect::route('groups.index')->with('status', 'group-created');
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
                    'message' => 'Merchant gagal ditambahkan.',
                ], 422);
            }
            return Redirect::route('groups.index')->with('status', 'group-creation-failed');
        }
    }
     public function update(Request $request)
    {
        try {
            $request->validate([
                'id'=>'required|integer',
                'group_name' => 'required|string|max:100',
                'group_id'=>'required|integer|max:100',
                'client_id'=>'required|integer|max:100',
                'client_name'=>'required|string|max:100',
                'merchant_name'=>'required|string|max:100',
                'segment_id'=>'required|integer|max:100',
                'segment_name'=>'required|string|max:100',
            ]);
            $payload=[
                "id"=>(int)$request->id,
                "merchant_name"=>strtoupper($request->merchant_name),
                "group_id"=>(int)$request->group_id,
                "group_name"=>strtoupper($request->group_name),
                "client_id"=>(int)$request->client_id,
                "client_name"=>strtoupper($request->client_name),
                 "segment_id"=>(int)$request->segment_id,
                "segment_name"=>strtoupper((string)$request->segment_name),
                "first_name"=>strtoupper((string)$request->first_name),
                "last_name"=>strtoupper((string)$request->last_name),
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/updateMerchant', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                throw new \RuntimeException('Invalid API response format or data type');
            } 
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Merchant berhasil diperbarui.',
                    'data' => $response['result'],
                ]);
            }
            return Redirect::route('groups.index')->with('status', 'group-updated');
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
                    'message' => 'Merchant gagal diperbarui.',
                ], 422);
            }
            return Redirect::route('groups.index')->with('status', 'group-updated-failed');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $payload=[
                "id"=>(int)$request->id,
            ];
            $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/deleteMerchant', $payload)->json();

            if (!is_array($response) || !isset($response['result']) || $response['responseCode']!='00') {
                throw new \RuntimeException('Invalid API response format or data type');
            } 
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Merchant berhasil dihapus.',
                ]);
            }
            return Redirect::route('groups.index')->with('status', 'group-deleted');
        } catch (\Throwable $th) {
            \Log::error("message", ['error' => $th]);
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Merchant gagal dihapus.',
                ], 422);
            }
            return Redirect::route('groups.index')->with('status', 'group-delete-failed');
        }
    }
}
