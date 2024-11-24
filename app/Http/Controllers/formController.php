<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formController extends Controller
{
    public function index()
    {
        return view('form.index');
    }

    public function form(Request $request)
    {
        $title = $request->input("title");
        $detail = $request->input("detail");

        return view('form.index', compact([$title], [$detail]));
    }

}
