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
                // back to login with alert
                return redirect()->back()->withInput()->with('error', $response['responseMessage'] ?? 'Wrong user or password, please try again');
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
                'referalCode' => 'required|string|max:255',
                'username' => 'required|string|max:255',
                'password' => 'required|string|min:6',
                'email' => 'required|email|max:255',
                'fullname' => 'required|string|max:255',
                'numberid' => 'required|string|max:50',
                'birthdate' => 'required|date',
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:255',
            ], [
                'referalCode.required' => 'referalCode is required.',
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
                "referal_code" => $validatedData['referalCode'],
                "username" => $validatedData['username'],
                "password" => $validatedData['password'],
                "email" => $validatedData['email'],
                "fullname" => $validatedData['fullname'],
                "numberid" => $validatedData['numberid'],
                "birthdate" => $validatedData['birthdate'],
                "phone" => $validatedData['phone'],
                "address" => $validatedData['address'],
            ];
            // dd($payload);
            $response = Http::post($this->hostService->GetUrl('m').'/v2/signup', $payload)->json();
            // dd($response);
            if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
                return redirect()->back()->withInput()->with('error', $response['responseMessage'] ?? 'Terjadi Kesalahan');
            }
            if($response['responseCode']!=='00'){
                return redirect()->back()->withInput()->with('error', $response['responseMessage'] ?? 'Terjadi Kesalahan');
            }
            $redirect="/msa/sign-in";
            $origin="signUp";
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
        $authHeader = request()->bearerToken();
        if(request()->isMethod('get')) {
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
            $response = Http::withToken($authHeader)->post($this->hostService->GetUrl('m').'/v2/get-profile',$payload)->json();
            // dd($response);
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
   
    public function inquiry()
    {
        $authHeader = request()->bearerToken();
        if(request()->isMethod('post')) {
            $validatedData = request()->validate([
                'product_code' => 'required|string|max:255',
                'customer_id' => 'required|string|max:255',
            ], [
                'product_code.required' => 'Product code is required.',
                'customer_id.required' => 'Customer ID is required.',
            ]);
            $payload = [
                "product_code" => $validatedData['product_code'],
                "customer_id" => $validatedData['customer_id'],
            ];
            $response = Http::withToken($authHeader)->post($this->hostService->GetUrl('m').'/v2/inquiry', $payload)->json();
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
    public function payment()
    {
        $authHeader = request()->bearerToken();
         if(request()->isMethod('post')) {
            $validatedData = request()->validate([
                'reference_number' => 'required|string|max:255',
                'pin' => 'required|string|max:255',
            ], [
                'reference_number.required' => 'Product code is required.',
                'pin.required' => 'Customer ID is required.',
            ]);
            $payload = [
                "reference_number" => $validatedData['reference_number'],
                "account_pin" => $validatedData['pin'],
            ];
            $response = Http::withToken($authHeader)->post($this->hostService->GetUrl('m').'/v2/payment', $payload)->json();
            if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
                if($response['message']=="invalid or expired jwt"){
                    return response()->json(['error'=>"invalid or expired jwt"],401);
                }else{
                    if($response['responseCode']=="44"){
                        return response()->json($response);
                }}
        
                return response()->json(['error' => 'Invalid API response format or data type'], 500);
            }
            return response()->json($response);
        }else{
            return view('contents.msa.signIn');
        }
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
    public function getProductPrefix()
    {
        // dd(request()->all());
         if(request()->isMethod('post')) {
            $dataReference="";
            $response=[];
            {//get reference
                $payload=[
                    "subscriberId"=>request()->customerId,
                ];
                $response = Http::withToken($this->hostService->GetToken())
                ->post($this->hostService->GetUrl('m').'/v1/utils/getproductByReference', $payload)->json();
                if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
                    if($response['message']=="invalid or expired jwt"){
                        return response()->json(['error'=>"invalid or expired jwt"],401);
                    }
                    return response()->json(['error' => 'Invalid API response format or data type'], 500);
                }
                $dataReference=$response['result']['data']['productReferenceCode'];
            }
            {
                $authHeader = request()->bearerToken();
                $filter=[
                    "product_reference_code"=>$dataReference,
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
                $response = Http::withToken($authHeader)->post($this->hostService->GetUrl('m').'/v2/get-product', $payload)->json();
                if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
                    if($response['message']=="invalid or expired jwt"){
                        return response()->json(['error'=>"invalid or expired jwt"],401);
                    }
                    return response()->json(['error' => 'Invalid API response format or data type'], 500);
                }
            }
            return response()->json($response);
        }else{
            return view('contents.msa.signIn');
        }
    }

    public function setPin()
    {
         $authHeader = request()->bearerToken();
        if (request()->isMethod('post')) {
            try {
                $validatedData = request()->validate([
                    'pin' => 'required|string|max:255',
                ], [
                    'pin.required' => 'PIN is required.',
                ]);
                $payload = [
                    "account_pin" => $validatedData['pin'],
                ];
                $response = Http::withToken($authHeader)
                    ->post($this->hostService->GetUrl('m').'/v2/pin-activation', $payload)
                    ->json();
                if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
                    if (isset($response['message']) && $response['message'] === "invalid or expired jwt") {
                        return response()->json(['error' => "invalid or expired jwt"], 401);
                    }
                    return response()->json(['error' => 'Invalid API response format or data type'], 500);
                }
                return response()->json($response);
            } catch (\Throwable $th) {
                return response()->json(['error' => 'An internal error occurred'], 500);
                // return redirect()->back()->withInput()->with('error', $response['responseMessage'] ?? 'Terjadi Kesalahan');
            }
        } else {
            return view('contents.msa.signIn');
        }
    }

    
}
