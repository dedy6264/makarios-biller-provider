<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MiniAppController extends Controller
{
      public function index()
    {
        session(['activeMenu'=>' Mini App']);
        return view('contents.mini_apps.index');
    }
}
