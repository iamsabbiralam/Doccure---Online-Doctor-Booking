<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Doctor;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function welcomePage() {

        $data['banners'] = Banner::all();
        $data['categories'] = Category::all();

        return view('welcome', $data);
    }

    public function doctors() {

        $data['doctors'] = Doctor::all();

        return view('user.doctors', $data);
    }

    // public function category() {

    //     $data['categories'] = Category::all();

    //     return view('welcome', $data);
    // }

    public function appointment() {

        $data['doctors'] = Doctor::all();

        return view('user.doctors', $data);
    }

    public function search(Request $request)
    {
        $q = $request->search;

        $data['doctors'] = Doctor::where('specialist','LIKE','%'.$q.'%')->get();

        return view('user.doctors', $data);
    }
}