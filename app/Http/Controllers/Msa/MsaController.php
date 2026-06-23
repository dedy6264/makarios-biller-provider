<?php

namespace App\Http\Controllers\Msa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\HostService;
use stdClass;
use Illuminate\Support\Number;
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
            // dd(request()->all());
            $payload=[
                "username"=>request()->input('username'),
                "password"=>request()->input('password'),
                "device_uid"=>request()->input('uid'),
            ];
            $response = Http::post($this->hostService->GetUrl('m').'/v2/signin', $payload)->json();
            // dd($response);
            if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
                // back to login with alert
                return redirect()->back()->withInput()->with('error', $response['responseMessage'] ?? 'Wrong user or password, please try again');
            }
            // if($response['responseCode']=='39'){
            //     return redirect()->back()->withInput()->with('error', $response['responseMessage'] ?? 'Wrong user or password, please try again');
            // }
            return response()->json($response);

            // $redirect="/msa/home";
            // $origin="signIn";
            // return view('contents.msa.loading', compact('response','redirect','origin'));
        }else{
            return view('contents.msa.signIn');
        }
    }
    public function resendOtp(){
        // dd(request()->all());
        if(request()->isMethod('post')) {
            $payload=[
                "device_uid"=>request()->input('uid'),
                "identifier"=>request()->input('identifier'),
            ];
            $response = Http::post($this->hostService->GetUrl('m').'/v2/resend-otp', $payload)->json();
            // dd($response);
            if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
                return redirect()->back()->withInput()->with('error', $response['responseMessage'] ?? 'Invalid OTP, please try again');
            }
            return response()->json($response);
        }else{
            return redirect()->back()->withInput()->with('error', $response['responseMessage'] ?? 'Invalid OTP, please try again');
        }
    }
    public function validateOtp(){
        // dd(request()->all());
        if(request()->isMethod('post')) {
            $payload=[
                "otp"=>request()->input('otp'),
                "device_uid"=>request()->input('uid'),
                "identifier"=>request()->input('identifier'),
            ];
            $response = Http::post($this->hostService->GetUrl('m').'/v2/validate-otp', $payload)->json();
            // dd($response);
            if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
                // back to login with alert
                return redirect()->back()->withInput()->with('error', $response['responseMessage'] ?? 'Invalid OTP, please try again');
            }
            return response()->json($response);

            // if($response['responseCode']=='39'){
            //     return redirect()->back()->withInput()->with('error', $response['responseMessage'] ?? 'Invalid OTP, please try again');
            // }
            // $redirect="/msa/home";
            // $origin="validateOtp";
            // return view('contents.msa.loading', compact('response','redirect','origin'));
        }else{
            // return view('contents.msa.validateOtp');
        }
    }
    public function paymentOtp(){
        $authHeader = request()->bearerToken();
        if(request()->isMethod('post')) {
            // dd(request()->all());
            $payload=[
                "reference_number"=>request()->input('reference_number'),
                "device_uid"=>request()->input('uid'),
                "identifier"=>"payment",
            ];
            $response = Http::withToken($authHeader)->post($this->hostService->GetUrl('m').'/v2/payment-otp', $payload)->json();
            // dd($response);
            if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
                // back to login with alert
                return redirect()->back()->withInput()->with('error', $response['responseMessage'] ?? 'Invalid OTP, please try again');
            }
            return response()->json($response);

            // if($response['responseCode']=='39'){
            //     return redirect()->back()->withInput()->with('error', $response['responseMessage'] ?? 'Invalid OTP, please try again');
            // }
            // $redirect="/msa/home";
            // $origin="validateOtp";
            // return view('contents.msa.loading', compact('response','redirect','origin'));
        }else{
            // return view('contents.msa.validateOtp');
        }
    }
    public function signUp()
    {
        // dd(request()->all());
        if(request()->isMethod('post')) {
            $validatedData = request()->validate([
                'referalCode' => 'required|string|max:255',
                'username' => 'required|string|max:255',
                'password' => 'required|string|min:6',
                'email' => 'required|email|max:255',
                'fullname' => 'required|string|max:255',
                'outletName' => 'required|string|max:255',
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
                'outletName.required' => 'Full name is required.',
                'numberid.required' => 'Number ID is required.',
                'birthdate.required' => 'Birthdate is required.',
                'birthdate.date' => 'Birthdate must be a valid date.',
                'phone.required' => 'Phone is required.',
                'address.required' => 'Address is required.',
            ]);
            $payload = [
                "referal_code" => request()->referalCode,
                "username" => $validatedData['username'],
                "password" => $validatedData['password'],
                "email" => $validatedData['email'],
                "fullname" => $validatedData['fullname'],
                "outlet_name" => $validatedData['outletName'],
                "numberid" => $validatedData['numberid'],
                "birthdate" => $validatedData['birthdate'],
                "phone" => $validatedData['phone'],
                "address" => $validatedData['address'],
            ];
            $response = Http::post($this->hostService->GetUrl('m').'/v2/signup', $payload)->json();
            // dd(":::",$response);
            if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
                return redirect()->back()->withInput()->with('error', $response['responseMessage'] ?? 'Terjadi Kesalahan');
            }
            // if($response['responseCode']!=='00'){
            //     return redirect()->back()->withInput()->with('error', $response['responseMessage'] ?? 'Terjadi Kesalahan');
            // }
            return response()->json($response);

            // $redirect="/msa/sign-in";
            // $origin="signUp";
            // return view('contents.msa.loading', compact('response','redirect','origin'));
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
    public function updatePassword()
    {
        $authHeader = request()->bearerToken();
        if(request()->isMethod('post')) {

            $payload=[
                "current_password"=>request()->input('currentPassword')?? '',
                "new_password"=>request()->input('newPassword')?? '',
                "device_uid"=>request()->input('uid')?? '',
            ];
            $response = Http::withToken($authHeader)->post($this->hostService->GetUrl('m').'/v2/update-password',$payload)->json();
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
    public function updateProfile()
    {

        $authHeader = request()->bearerToken();
        if(request()->isMethod('post')) {
              $filter=[
                "merchant_outlet_name"=>request()->input('outletName')?? '',
                "id"=>(int)request()->input('id'),
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
            $response = Http::withToken($authHeader)->post($this->hostService->GetUrl('m').'/v2/update-profile',$payload)->json();
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
                'otp' => 'required|string|max:255',
                'uid' => 'required|string|max:255',
            ], [
                'reference_number.required' => 'Product code is required.',
                'otp.required' => 'OTP is required.',
                'uid.required' => 'Device ID is required.',
            ]);
            $payload = [
                "reference_number" => $validatedData['reference_number'],
                "otp" => $validatedData['otp'],
                "device_uid" => $validatedData['uid'],
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
    function numbFormatted($amnt){
        $formatted = "Rp " . number_format($amnt, 0, ',', '.');
        return $formatted;
    }
    public function print($id,$t){
        $filter=[
                "reference_number"=>$id,
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
        $response = Http::withToken($t)->post($this->hostService->GetUrl('m').'/v2/transaction-detail', $payload)->json();
        if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
            if($response['message']=="invalid or expired jwt"){
                return response()->json(['error'=>"invalid or expired jwt"],401);
            }
            return response()->json(['error' => 'Invalid API response format or data type'], 500);
        }
        $data=$response['result']['data'];
        $addText="";
        if($data['bill_info'] && $data['bill_info']['bill_desc'] && $data['bill_info']['bill_desc']!==""){
            $cleanData = json_decode($data['bill_info']['bill_desc'], true);
            switch ($data['product_category_id']) {
                case 1:
                     $addText= $addText."
                     <tr>
                     <td style=' font-size:7px;text-align:left;'>Sn</td><td>:</td><td style=' font-size:7px;text-align:right;'>".$data['bill_info']['sn']."</td>
                     </tr>
                     <tr>
                         <td style=' font-size:7px;text-align:left;'>Product Price</td><td>:</td><td style=' font-size:7px;text-align:right;'>".$this->numbFormatted($data['product_price'])."</td>
                     </tr>
                        ";
                    break;
                case 6:
                     $addText= $addText."
                        <tr>
                            <td style=' font-size:7px;text-align:left;'>Sn</td><td>:</td><td style=' font-size:7px;text-align:right;'>".$data['bill_info']['sn']."</td>
                        </tr>
                        <tr>
                            <td style=' font-size:7px;text-align:left;'>Lembar Tagihan </td><td>:</td><td style=' font-size:7px;text-align:right;'>".$data['bill_info']['lemb_tag']."</td>
                        </tr>
                        <tr>
                            <td style=' font-size:7px;text-align:left;'>Customer Name </td><td>:</td><td style=' font-size:7px;text-align:right;'>".$cleanData['customer_name']."</td>
                        </tr>
                        <tr>
                            <td style=' font-size:7px;text-align:left;'>No Meter </td><td>:</td><td style=' font-size:7px;text-align:right;'>".$cleanData['meter_no']."</td>
                        </tr>
                        <tr>
                            <td style=' font-size:7px;text-align:left;'>Tarif/Daya </td><td>:</td><td style=' font-size:7px;text-align:right;'>".$cleanData['tarif']."/".$cleanData['daya']."</td>
                        </tr>
                        <tr>
                            <td style=' font-size:7px;text-align:left;'>Kwh </td><td>:</td><td style=' font-size:7px;text-align:right;'>".$cleanData['kwh']."</td>
                        </tr>
                        <tr>
                            <td style=' font-size:7px;text-align:left;'>Token </td><td>:</td><td style=' font-size:7px;text-align:right;'>".$data['bill_info']['sn']."</td>
                        </tr>
                         <tr>
                            <td style=' font-size:7px;text-align:left;'>Product Price</td><td>:</td><td style=' font-size:7px;text-align:right;'>".$this->numbFormatted($data['product_price'])."</td>
                        </tr>
                        ";
                    break;
                
                default:
                    # code...
                    break;
            }
        }
        $text="
        <table style='width: 100%; border-collapse: collapse;'>
        <tr><td style=' font-size:7px;text-align:left;'>Product Name</td><td>:</td><td style=' font-size:7px;text-align:right;'>".$data['product_name']."</td></tr>
        <tr><td style=' font-size:7px;text-align:left;'>Customer ID</td><td>:</td><td style=' font-size:7px;text-align:right;'>".$data['customer_id']."</td></tr>
        ".$addText."
        </table>";
        $a = [];

        // --- 1. HEADER TOKO ---
        $obj = new stdClass();
        $obj->type = 4; 
        $obj->content = "
        <table style='width: 100%; border-collapse: collapse;'>".
            "<td style='font-weight:bold; font-size:12px; text-align:center'>".
            $data['merchant_outlet_name'].
            " </td>".
        "</table>";
        $obj->bold = 1;
        $obj->align = 1; // Center
        $obj->format = 3; // Double Width
        $a[] = $obj;

        // Garis Pembatas
        $a[] = $this->createSeparator();

        // --- 2. METADATA TRANSAKSI ---
        $obj = new stdClass();
        $obj->type = 4; 
        $obj->content = "
        <table style='width: 100%; border-collapse: collapse;'>
            <tr>
                <td style=' font-size:7px;text-align:left;'>
                    No Reff
                </td>
                <td>:</td>
                <td style=' font-size:7px;text-align:right;'>".$data['reference_number']."</td>
            </tr>
            <tr>
                <td style=' font-size:7px;text-align:left;'>
                    Tanggal
                </td>
                <td>:</td>
                <td style=' font-size:7px;text-align:right;'>".$data['updated_at']."</td>
            </tr>
        </table>";
        $obj->bold = 1;
        $obj->align = 1; // Center
        $obj->format = 3; // Double Width
        $a[] = $obj;

        $a[] = $this->createSeparator();

        // --- 3. DAFTAR ITEM BELANJA ---
        $obj = new stdClass();
        $obj->type = 4; 
        $obj->content = $text;
        $obj->bold = 1;
        $obj->align = 1; // Center
        $obj->format = 3; // Double Width
        $a[] = $obj;

        $a[] = $this->createSeparator();

        // --- 4. TOTAL, BAYAR, KEMBALI ---
       $obj = new stdClass();
        $obj->type = 4; 
        $obj->content = "
        <table style='width: 100%; border-collapse: collapse;'>
            <tr>
                <td style='font-weight:bold; font-size:7px;text-align:left;'>
                    Total Amount
                </td>
                <td>:</td>
                <td style='font-weight:bold; font-size:7px;text-align:right;'>".$this->numbFormatted($data['transaction_total_amount'])."</td>
            </tr>
        </table>";
        $obj->bold = 1;
        $obj->align = 1; // Center
        $obj->format = 3; // Double Width
        $a[] = $obj;

        $a[] = $this->createSeparator();

        // --- 5. FOOTER & QR CODE ---
        $obj = new stdClass();
        $obj->type = 4;
        $obj->content = '<p>Terima Kasih Atas Kunjungan Anda<br />Barang yang sudah dibeli tidak dapat ditukar</p>';
        $obj->bold = 0;
        $obj->align = 1; // Center
        $obj->format = 4; // Small
        $a[] = $obj;
        
        $obj = new stdClass();
        $obj->type = 4;
        $obj->content = '<p><br/></p>';
        $obj->bold = 0;
        $obj->align = 1; // Center
        $obj->format = 4; // Small
        $a[] = $obj;
        
        // Return dengan format JSON Object ter-force
        return response()->json($a, 200, [], JSON_FORCE_OBJECT);
    }
    private function createSeparator()
    {
        $obj = new stdClass();
        $obj->type = 4;
        $obj->content = "<table style='width: 100%; border-collapse: collapse;'>
            <tr>
                <td style='font-weight:bold; font-size:7px;text-align:center;'>
                <p>---------------------------</p>
                </td>
            </tr>
        </table>";
        $obj->bold = 0;
        $obj->align = 1; // Center
        $obj->format = 4; // Small text
        return $obj;
    }
    public function getTransaction()
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
            $response = Http::withToken($authHeader)->post($this->hostService->GetUrl('m').'/v2/transaction-detail', $payload)->json();
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
    public function getTransactions()
    {
        $authHeader = request()->bearerToken();
         if(request()->isMethod('post')) {
            // dd(request()->all());
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
    public function getProduct()
    {
        // dd(request()->all());
         if(request()->isMethod('post')) {
            $response=[];
            {
                $authHeader = request()->bearerToken();
                $filter=[
                    "product_reference_code"=>request()->productReferenceCode,
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
    public function getProductPrefix()
    {
        if(request()->isMethod('post')) {
            $response=[];
            {//get reference
                $payload=[
                    "subscriberId"=>request()->customerId,
                ];
                $response = Http::withToken($this->hostService->GetToken())
                ->post($this->hostService->GetUrl('m').'/v1/utils/getproductByReference', $payload)->json();
                // dd($response);
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