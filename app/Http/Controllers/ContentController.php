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
        return redirect(route('output'));
    }

    public function output()
    {
        $contents_get_query = Content::select('*');
        $items = $contents_get_query->get();
    
        return view('contents.output', [
            'items' => $items,
        ]);
    }

    public function detail($content_id)
    {
        $content_get_query = Content::select('*');
        $item = $content_get_query->find($content_id);

        return view('contents.detail', [
            'item' => $item,
        ]);
    }

    // 下記を追記する
    public function edit($content_id)
    {
        $content_get_query = Content::select('*');
        $item = $content_get_query->find($content_id);

        return view('contents.edit', [
            'item' => $item,
        ]);
    }

    public function update(Request $request)
    {
        $content_get_query = Content::select('*');
        $content_info = $content_get_query->find($request['id']);
        $content_info->content = $request['content'];
        $content_info->save();
        return redirect(route('output'));
    }
    // 上記までを追記する
}