<?php

namespace App\Http\Controllers;

use App\Models\{UserRole,User,Role};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\HostService;

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
        // dd($clients);
        return view('contents.user_roles.index', compact('users', 'roles','clients'));
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
        $request->validate([
            'user_id'       => 'required',
            'role_id'       => 'required',
            'client_id'    => 'integer',
            'merchant_id'  => 'integer',
            'outlet_id'    => 'integer',
        ]);

        UserRole::create([
            'user_id'       => (int)$request->input('user_id'),
            'role_id'       => (int)$request->input('role_id'),
            'client_id'    => (int)$request->input('client_id'),
            'merchant_id'  => (int)$request->input('merchant_id'),
            'outlet_id'    => (int)$request->input('outlet_id'),
        ]);

        return redirect()->route('user_roles.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'user_id'       => 'required',
            'role_id'       => 'required',
            'client_id'    => 'integer',
            'merchant_id'  => 'integer',
            'outlet_id'    => 'integer',
        ]);

        UserRole::where('id', $request->id)->update([
            'user_id'       => (int)$request->input('user_id'),
            'role_id'       => (int)$request->input('role_id'),
            'client_id'    => (int)$request->input('client_id'),
            'merchant_id'  => (int)$request->input('merchant_id'),
            'outlet_id'    => (int)$request->input('outlet_id'),
        ]);
        return redirect()->route('user_roles.index');
    }

    public function destroy(Request $request)
    {
        $user = UserRole::findOrFail($request->id);
        $user->delete();
        return Redirect::route('user_roles.index')->with('status', 'profile-deleted');
    }
}
