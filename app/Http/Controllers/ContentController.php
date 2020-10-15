<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    // 下記を追記する
    public function input()
    {
        return view('contents.input');
    }
}