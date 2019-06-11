<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\Tag;

class TagController extends Controller
{
    public function manageTags(){
        $tags = Tag::get();
        // dd($tags);
        return view('admin.managetag')->with(compact('tags'));
    }
    public function addTag(Request $request){
        // dd($request->name);
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();
        return response()->json($tag);
    }
    public function deleteTag(Request $request){
        // dd($request->all());
        $data = Tag::find($request->id)->delete();
        return response()->json($data);
    }
    public function updateTag(Request $request){
        // dd($request->all());
        $tag = Tag::find($request->id);
        $tag->name = $request->name;
        $tag->save();
        $tag->sn = $request->sn;
        return response()->json($tag);
        // dd($tag->name);
    }
}
