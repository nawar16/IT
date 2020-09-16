<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\News;
use App\Http\Resources\news as NewsResource;

class NewsController extends Controller
{

    public function index()
    {
        $posts = News::paginate(15);
        return NewsResource::collection($posts);
    }

    public function store(Request $request)
    {
        $post = $request->isMethod('put') ? News::findOrFail($request->ID) : new News;
        
                $post->Title = $request->input('Title');
                $post->Details = $request->input('Details');
                $post->PostDate = $request->input('PostDate');
                $post->TargetStudents = $request->input('TargetStudents');
                $post->TargetProffessors = $request->input('TargetProffessors');
        
                if($post->save()){
                    return new NewsResource($post);
                }
    }

    public function show($id)
    {
        $post = News::findOrFail($id);
        return new NewsResource($post);
    }

    public function destroy($id)
    {
        $post = News::findOrFail($id);
        if($post->delete()){
            return new NewsResource($post);
        }
    }
}

