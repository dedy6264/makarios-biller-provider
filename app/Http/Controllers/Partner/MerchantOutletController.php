<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Services\HostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class MerchantOutletController extends Controller
{
    protected $hostService;

    public function __construct(HostService $hostService)
    {
        $this->hostService = $hostService;
    }

    public function getAll()
    {
        $filter = [
            'id' => (int) request()->input('id', 0),
            'cif_id' => 0,
            'client_id' => (int) request()->input('client_id', 0),
            'client_name' => '',
            'group_id' => (int) request()->input('group_id', 0),
            'group_name' => '',
            'merchant_id' => (int) request()->input('merchant_id', 0),
            'merchant_name' => '',
            'merchant_outlet_name' => '',
            'segment_id' => 0,
            'segment_name' => '',
            'saving_account_id' => 0,
            'saving_account_name' => '',
            'username' => '',
            'password' => '',
            'device_uid' => '',
            'is_verified' => '',
            'verified_at' => '',
            'created_by' => '',
            'updated_by' => '',
            'created_at' => '',
            'updated_at' => '',
        ];

        $payload = [
            'start' => 0,
            'length' => 100,
            'columns' => '',
            'search' => '',
            'order' => 'id',
            'sort' => 'asc',
            'start_date' => '',
            'end_date' => '',
            'filter' => $filter,
        ];

        $response = Http::withBasicAuth('mocha', 'michi')
            ->post($this->hostService->GetUrl('m') . '/getMerchantOutlet', $payload)
            ->json();

        if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
            return response()->json(['error' => 'Invalid API response format or data type'], 500);
        }

        $result = $response['result'];

        return response()->json([
            'draw' => 1,
            'recordsTotal' => $result['records_total'] ?? count($result['data'] ?? []),
            'recordsFiltered' => $result['records_filtered'] ?? count($result['data'] ?? []),
            'data' => $result['data'] ?? [],
        ]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'client_id' => 'required|integer',
                'client_name' => 'required|string|max:100',
                'group_id' => 'required|integer',
                'group_name' => 'required|string|max:100',
                'merchant_id' => 'required|integer',
                'merchant_name' => 'required|string|max:100',
                'merchant_outlet_name' => 'required|string|max:100',
            ]);

            $payload = $this->payload($request);
            $response = Http::withBasicAuth('mocha', 'michi')
                ->post($this->hostService->GetUrl('m') . '/addMerchantOutlet', $payload)
                ->json();

            if (!is_array($response) || !isset($response['result']) || $response['responseCode'] !== '00') {
                throw new \RuntimeException('Invalid API response format or data type');
            }

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Merchant outlet berhasil ditambahkan.',
                    'data' => $response['result'],
                ]);
            }

            return Redirect::route('clients.index')->with('status', 'merchant-outlet-created');
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
            \Log::error('Failed create merchant outlet', ['error' => $th]);
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Merchant outlet gagal ditambahkan.',
                ], 422);
            }

            return Redirect::route('clients.index')->with('status', 'merchant-outlet-creation-failed');
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer',
                'client_id' => 'required|integer',
                'client_name' => 'required|string|max:100',
                'group_id' => 'required|integer',
                'group_name' => 'required|string|max:100',
                'merchant_id' => 'required|integer',
                'merchant_name' => 'required|string|max:100',
                'merchant_outlet_name' => 'required|string|max:100',
            ]);

            $payload = $this->payload($request);
            $response = Http::withBasicAuth('mocha', 'michi')
                ->post($this->hostService->GetUrl('m') . '/updateMerchantOutlet', $payload)
                ->json();

            if (!is_array($response) || !isset($response['result']) || $response['responseCode'] !== '00') {
                throw new \RuntimeException('Invalid API response format or data type');
            }

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Merchant outlet berhasil diperbarui.',
                    'data' => $response['result'],
                ]);
            }

            return Redirect::route('clients.index')->with('status', 'merchant-outlet-updated');
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
            \Log::error('Failed update merchant outlet', ['error' => $th]);
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Merchant outlet gagal diperbarui.',
                ], 422);
            }

            return Redirect::route('clients.index')->with('status', 'merchant-outlet-update-failed');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $payload = $this->payload($request);
            $response = Http::withBasicAuth('mocha', 'michi')
                ->post($this->hostService->GetUrl('m') . '/deleteMerchantOutlet', $payload)
                ->json();

            if (!is_array($response) || !isset($response['result']) || $response['responseCode'] !== '00') {
                throw new \RuntimeException('Invalid API response format or data type');
            }

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Merchant outlet berhasil dihapus.',
                ]);
            }

            return Redirect::route('clients.index')->with('status', 'merchant-outlet-deleted');
        } catch (\Throwable $th) {
            \Log::error('Failed delete merchant outlet', ['merchant_outlet_id' => $request->id, 'error' => $th]);
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Merchant outlet gagal dihapus.',
                ], 422);
            }

            return Redirect::route('clients.index')->with('status', 'merchant-outlet-delete-failed');
        }
    }

    private function payload(Request $request): array
    {
        return [
            'id' => (int) $request->input('id', 0),
            'cif_id' => (int) $request->input('cif_id', 0),
            'client_id' => (int) $request->input('client_id', 0),
            'client_name' => strtoupper((string) $request->input('client_name', '')),
            'group_id' => (int) $request->input('group_id', 0),
            'group_name' => strtoupper((string) $request->input('group_name', '')),
            'merchant_id' => (int) $request->input('merchant_id', 0),
            'merchant_name' => strtoupper((string) $request->input('merchant_name', '')),
            'merchant_outlet_name' => strtoupper((string) $request->input('merchant_outlet_name', '')),
            'segment_id' => (int) $request->input('segment_id', 0),
            'segment_name' => strtoupper((string) $request->input('segment_name', '')),
            'saving_account_id' => (int) $request->input('saving_account_id', 0),
            'saving_account_name' => strtoupper((string) $request->input('saving_account_name', '')),
            'username' => (string) $request->input('username', ''),
            'password' => (string) $request->input('password', ''),
            'device_uid' => (string) $request->input('device_uid', ''),
            'is_verified' => (string) $request->input('is_verified', ''),
            'verified_at' => (string) $request->input('verified_at', ''),
            'created_by' => (string) $request->input('created_by', ''),
            'updated_by' => (string) $request->input('updated_by', ''),
            'created_at' => (string) $request->input('created_at', ''),
            'updated_at' => (string) $request->input('updated_at', ''),
        ];
    }
}
