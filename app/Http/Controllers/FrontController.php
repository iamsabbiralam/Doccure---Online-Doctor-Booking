<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function welcomePage() {

        $data['banners'] = Banner::all();

        return view('welcome', $data);
    }
}
