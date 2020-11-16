<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
// 下記を追記する
use App\Models\ContentImage;
use Illuminate\Support\Facades\Storage;
// 上記までを追記する

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

        // 下記を追記する
        if ($request->file('file')) {
            $this->validate($request, [
                'file' => [
                    // 空でないこと
                    'required',
                    // アップロードされたファイルであること
                    'file',
                    // 画像ファイルであること
                    'image',
                    // MIMEタイプを指定
                    'mimes:jpeg,png',
                ]
            ]);
    
            if ($request->file('file')->isValid([])) {
                $file_name = $request->file('file')->getClientOriginalName();
                $file_path = Storage::putFile('/images', $request->file('file'), 'public');
                
                $image_info = new ContentImage();
                $image_info->content_id = $input_content->id;
                $image_info->file_name = $file_name;
                $image_info->file_path = $file_path;
                $image_info->save();
            }
        }
        // 上記までを追記する
        return redirect(route('output'));
    }

    public function output()
    {
        $contents_get_query = Content::select('*');
        $items = $contents_get_query->get();

        // 下記を追記する
        foreach ($items as &$item) {
            $file_path = ContentImage::select('file_path')
            ->where('content_id', $item['id'])
            ->first();
            if (isset($file_path)) {
                $item['file_path'] = $file_path['file_path'];
            }
        }
        // 上記までを追記する
    
        return view('contents.output', [
            'items' => $items,
        ]);
    }

    public function detail($content_id)
    {
        $content_get_query = Content::select('*');
        $item = $content_get_query->find($content_id);

        // 下記を追記する
        $file_path = ContentImage::select('file_path')
        ->where('content_id', $item['id'])
        ->first();
        if (isset($file_path)) {
            $item['file_path'] = $file_path['file_path'];
        }
        // 上記までを追記する

        return view('contents.detail', [
            'item' => $item,
        ]);
    }

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

    public function delete(Request $request)
    {
        $contents_delete_query = Content::select('*');
        $contents_delete_query->find($request['id']);
        $contents_delete_query->delete();

        // 下記を追記
        $content_images_delete_query = ContentImage::select('*');
        if ($content_images_delete_query->find($request['id'] !== '[]')) {
            $content_images_delete_query->delete();
        }
        // 上記までを追記

        return redirect(route('output'));
    }
}