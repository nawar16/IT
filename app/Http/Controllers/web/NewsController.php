<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\News;
use App\Http\Resources\news as NewsResource;

class NewsController extends Controller
{

    public function index()
    {
        $posts = News::paginate(15);
        return view('home', $posts);
    }

    public function store(Request $request)
    {
        $post = $request->isMethod('put') ? News::findOrFail($request->ID) : new News;
        
                $post->Title = $request->input('Title');
                $post->Details = $request->input('Details');
                $post->PostDate = $request->input('PostDate');
        
                if($post->save()){
                    return redirect(route('admin.dashboard'), $post);
                }
    }

    public function show($id)
    {
        $post = News::findOrFail($id);
        return view('home', $post);
    }

    public function destroy($id)
    {
        $post = News::findOrFail($id);
        if($post->delete()){
            return view('admin.dashboard', $post);
        }
    }
}

