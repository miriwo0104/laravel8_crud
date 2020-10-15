<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    public function input()
    {
        return view('contents.input');
    }

    public function save(Request $request)
    {
        $input_content = new Content();
        $input_content->content = $request['content'];
        $input_content->save();
        //  下記を修正する
        return redirect(route('output'));
    }

    // 下記を追記する
    public function output()
    {
        $contents_get_query = Content::select('*');
        $items = $contents_get_query->get();
    
        return view('contents.output', [
            'items' => $items,
        ]);
    }
    // 上記までを追記する
}