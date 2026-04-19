<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Log;
class TunnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
  public function payment()
{
    // Ambil semua data dari request tanpa kecuali
    $payload = request()->all();

    // Teruskan langsung ke IAK
    $response = Http::post('https://prepaid.iak.dev/api/top-up', $payload);
Log::info('Response dari IAK:', [
        'status' => $response->status(),
        // 'status' => $payload,
        'body' => $response->json()
    ]);
    // Kembalikan response asli (body + status code) dari IAK ke frontend kamu
    return response()->json($response->json(), $response->status());
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
