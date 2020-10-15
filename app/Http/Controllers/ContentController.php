<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 下記を追記する
use App\Models\Content;

class ContentController extends Controller
{
    public function input()
    {
        return view('contents.input');
    }

    // 下記を追記する
    public function save(Request $request)
    {
        $input_content = new Content();
        $input_content->content = $request['content'];
        $input_content->save();
    
        return redirect(route('input'));
    }
    // 上記までを追記する
}