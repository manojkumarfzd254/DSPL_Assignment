<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class PostMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::paginate(10);
        return view('post_method.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post_method.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->except('_token','_method');
        $input = $this->uploadImage($input,"uploads");
        Blog::create($input);
        return redirect()->route('post_methods.index')->withSuccess('Blog was created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::find($id);
        return view("post_method.show",compact("blog"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::find($id);
        return view("post_method.edit",compact("blog"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->except('_token','_method');
        $input = $this->uploadImage($input,"uploads");
        Blog::where('id',$id)->update($input);
        return redirect()->route('post_methods.index')->withSuccess('Blog was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::find($id)->delete();
        return redirect()->route('post_methods.index')->withSuccess('Blog was delete successfully.');
    }

    public function uploadImage($input, $folder = '')
    {
        if (isset($input['image'])) {
            $image = $input['image'];
            $name =  $image->getClientOriginalExtension();
            $fullname = rand(10, 1000) . "." . $name;
            $fullname = preg_replace('/\s+/', '', $fullname);
            $image->move($folder . '/', $fullname);
            $input['image'] = $folder . "/" . $fullname;
            return $input;
        } else {
            return $input;
        }
    }
}
