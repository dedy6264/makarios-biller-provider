<?php

namespace App\Http\Controllers\Msa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\HostService;

class MsaController extends Controller
{
    protected $hostService;
    public function __construct(HostService $hostService){
        $this->hostService = $hostService;
    }
    public function index()
    {
        return view('contents.msa.landingPage');
    }
    public function signIn()
    {
        if(request()->isMethod('post')) {
            $payload=[
                "username"=>request()->input('username'),
                "password"=>request()->input('password'),
            ];
            $response = Http::post($this->hostService->GetUrl('m').'/v2/signin', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
                if($response['message']=="invalid or expired jwt"){
                    return response()->json(['error'=>"invalid or expired jwt"],401);
                }
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            }
            $redirect="/msa/home";
            $origin="signIn";
            return view('contents.msa.loading', compact('response','redirect','origin'));
        }else{
            return view('contents.msa.signIn');
        }
    }
     public function signUp()
    {
        if(request()->isMethod('post')) {
            $validatedData = request()->validate([
                'username' => 'required|string|max:255',
                'password' => 'required|string|min:6',
                'email' => 'required|email|max:255',
                'fullname' => 'required|string|max:255',
                'numberid' => 'required|string|max:50',
                'birthdate' => 'required|date',
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:255',
            ], [
                'username.required' => 'Username is required.',
                'password.required' => 'Password is required.',
                'password.min' => 'Password must be at least 6 characters.',
                'email.required' => 'Email is required.',
                'email.email' => 'Email must be a valid email address.',
                'fullname.required' => 'Full name is required.',
                'numberid.required' => 'Number ID is required.',
                'birthdate.required' => 'Birthdate is required.',
                'birthdate.date' => 'Birthdate must be a valid date.',
                'phone.required' => 'Phone is required.',
                'address.required' => 'Address is required.',
            ]);
            $payload = [
                "username" => $validatedData['username'],
                "password" => $validatedData['password'],
                "email" => $validatedData['email'],
                "fullname" => $validatedData['fullname'],
                "numberid" => $validatedData['numberid'],
                "birthdate" => $validatedData['birthdate'],
                "phone" => $validatedData['phone'],
                "address" => $validatedData['address'],
            ];
            $response = Http::post($this->hostService->GetUrl('m').'/v2/signup', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
                if($response['message']=="invalid or expired jwt"){
                    return response()->json(['error'=>"invalid or expired jwt"],401);
                }
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            }
            $redirect="/msa/sign-in";
            $origin="signIn";
            return view('contents.msa.loading', compact('response','redirect','origin'));
        }else{
            return view('contents.msa.signUp');
        }
    }
    public function getBalance()
    {
        //get header of request
        $authHeader = request()->bearerToken();
        if(request()->isMethod('get')) {
            $response = Http::withToken($authHeader)->post($this->hostService->GetUrl('m').'/v2/get-balance')->json();
            if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
                if($response['message']=="invalid or expired jwt"){
                    return response()->json(['error'=>"invalid or expired jwt"],401);
                }
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            }
            return response()->json($response);
        }else{
            return view('contents.msa.signIn');
        }
    }
    public function home()
    {
        return view('contents.msa.home');
    }
    public function getProfile()
    {
        return view('contents.msa.profile');
    }
   
    public function getTransactions()
    {
        $authHeader = request()->bearerToken();
         if(request()->isMethod('post')) {
            $filter=[
                "reference_number"=>request()->input('reference_number')?? '',
            ];
            $payload=[
                "start"=>request()->input('start')?? 0,
                "length"=>request()->input('length')?? 10,
                "columns"=>request()->input('columns')??'',
                "search"=>request()->input('search')??'',
                "order"=>request()->input('order')??'',
                "sort"=>request()->input('sort')??'',
                "start_date" => request()->input('start_date') ?: now()->format('Y-m-d'),
                "end_date" => request()->input('end_date') ?: now()->format('Y-m-d'),
                "filter"=>$filter,
            ];
            $response = Http::withToken($authHeader)->post($this->hostService->GetUrl('m').'/v2/history', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
                if($response['message']=="invalid or expired jwt"){
                    return response()->json(['error'=>"invalid or expired jwt"],401);
                }
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            }

            return response()->json($response);
        }else{
            return view('contents.msa.signIn');
        }
        return view('contents.msa.transactions');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
