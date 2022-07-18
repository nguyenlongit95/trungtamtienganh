<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        return view('frontend.index');
    }

    public function detail()
    {
        return view('frontend.detail');
    }
}
