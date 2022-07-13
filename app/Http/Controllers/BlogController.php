<?php

namespace App\Http\Controllers;
use App\Models\Blog;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //

    public function index(Request $request){

        $search_title = $request->get('search');
        
        $blogs = Blog::latest()->paginate(10);

        if($search_title)$blogs = Blog::where('title', 'like', '%' . $search_title . '%')->latest()->paginate(5);


        return view("blogs.index", compact("blogs"))->with("i", (request()->input("page", 1)-1)*5);
    }

    public function create(){
        return view("blogs.create");
    }


    public function store(Request $request){

        
        $request->validate([
            'title' => "required",
            'description' => "required",
            'author' => "required",
            'is_active' => "required",

        ]);

        Blog::create($request->all());

        return redirect()->route('blogs.index')->with("success", "Blog created successfully");
    }

    public function show($id){
        $blog = Blog::all($id);
        return view('blogs.show', compact('blog'));
    }

    public function edit(Blog $blog){
        return view("blogs.edit", compact('blog'));
    }

    public function destroy(Blog $blog){
        
        $blog->delete();

        return redirect()->route('blogs.index')->with("success", "Blog deleted successfully");

        
    }

}
