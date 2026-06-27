<?php

namespace App\Http\Controllers;

use App\Models\{UserRole,User,Role};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\HostService;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserRoleController extends Controller
{
     protected $hostService;
     public function __construct(HostService $hostService){
        $this->hostService = $hostService;
    }
    public function index()
    {
        session(['activeMenu'=>'User Role']);
        $users = User::all();
        $roles = Role::all();
        $filter=[
            "id"=>0,
            "client_name"=>"",
            "merchant_name"=>"",
            "merchant_outlet_name"=>"",
        ];
        $payload=[
            "start"=>0,
            "length"=>100,
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
        $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/getMerchant', $payload)->json();
        if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
            return response()->json(['error' => 'Invalid API response format or data type'], 500);
        }
        $response = $response['result'];
        $merchants=$response['data'];
        $response = Http::withBasicAuth('mocha','michi')->post($this->hostService->GetUrl('m').'/getMerchantOutlet', $payload)->json();
        if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
            return response()->json(['error' => 'Invalid API response format or data type'], 500);
        }
        $response = $response['result'];
        $merchant_outlets=$response['data'];
        // dd($clients);
        return view('viller.content.user-role', compact('users', 'roles','clients','merchant_outlets', 'merchants'));
    }
    public function getAll(){
        $data=UserRole::join('roles', 'user_roles.role_id', '=', 'roles.id')
            ->join('users', 'user_roles.user_id', '=', 'users.id')
            ->select(
                'user_roles.id',
                'user_roles.role_id',
                'user_roles.user_id',
                'user_roles.client_id',
                'user_roles.merchant_id',
                'user_roles.outlet_id',
                'user_roles.created_at',
                'user_roles.updated_at',
                'roles.role_name as role_name',
                'users.name as user_name',
                'user_roles.client_id as client_id')
            ->get();
        $dt=[
            "draw"=> 1,
            "recordsTotal"=> count($data->toArray()),
            "recordsFiltered"=> count($data->toArray()),
            "data"=> $data->toArray(),
        ];
        return response()->json($dt);
    }

     public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id'       => ['required', Rule::unique('user_roles', 'user_id')],
                'role_id'       => 'required',
                'client_id'    => 'nullable|integer',
                'merchant_id'  => 'nullable|integer',
                'merchant_outlet_id'    => 'nullable|integer',
            ]);

            $userRole = UserRole::create([
                'user_id'       => (int)$request->input('user_id'),
                'role_id'       => (int)$request->input('role_id'),
                'client_id'    => (int)$request->input('client_id'),
                'merchant_id'  => (int)$request->input('merchant_id'),
                'outlet_id'    => (int)$request->input('merchant_outlet_id'),
            ]);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'User role berhasil ditambahkan.',
                    'data' => $userRole,
                ]);
            }

            return redirect()->route('user_roles.index');
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
            \Log::error('Failed create user role', ['error' => $th]);
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'User role gagal ditambahkan.',
                ], 422);
            }

            return redirect()->route('user_roles.index')->with('status', 'user-role-creation-failed');
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'user_id'       => ['required', Rule::unique('user_roles', 'user_id')->ignore($request->id)],
                'role_id'       => 'required',
                'client_id'    => 'nullable|integer',
                'merchant_id'  => 'nullable|integer',
                'merchant_outlet_id'    => 'nullable|integer',
            ]);

            UserRole::where('id', $request->id)->update([
                'user_id'       => (int)$request->input('user_id'),
                'role_id'       => (int)$request->input('role_id'),
                'client_id'    => (int)$request->input('client_id'),
                'merchant_id'  => (int)$request->input('merchant_id'),
                'outlet_id'    => (int)$request->input('merchant_outlet_id'),
            ]);

            $userRole = UserRole::find($request->id);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'User role berhasil diperbarui.',
                    'data' => $userRole,
                ]);
            }

            return redirect()->route('user_roles.index');
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
            \Log::error('Failed update user role', ['error' => $th]);
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'User role gagal diperbarui.',
                ], 422);
            }

            return redirect()->route('user_roles.index')->with('status', 'user-role-update-failed');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $user = UserRole::findOrFail($request->id);
            $user->delete();

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'User role berhasil dihapus.',
                ]);
            }

            return Redirect::route('user_roles.index')->with('status', 'profile-deleted');
        } catch (\Throwable $th) {
            \Log::error('Failed delete user role', ['user_role_id' => $request->id, 'error' => $th]);
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'User role gagal dihapus.',
                ], 422);
            }

            return Redirect::route('user_roles.index')->with('status', 'user-role-deletion-failed');
        }
    }
}
