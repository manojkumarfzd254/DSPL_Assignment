<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use DataTables;

class AjaxMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('ajax_method.index');
    }

    public function index_data(Request $request)
    {

            $data = Blog::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('image',function($row){
                        return '<img src="'.asset($row->image).'" style="width:120px;height:80px" alt="'.$row->title.'">';
                    })
                    ->addColumn('action', function($row){

                           $btn = '
                           <a href="'.route('ajax_methods.edit',['ajax_method'=>$row->id]).'" class="btn btn-info">Edit</a>
                           <a href="javascript:void(0)" data-id="'.$row->id.'" class="deleteBlog btn btn-danger">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ajax_method.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->except('_token','_method');
        $input = $this->uploadImage($input,"uploads");
        Blog::create($input);
        return response()->json(['status'=>true,'message'=>'Blog was created successfully.','data'=>$input]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::find($id);
        return view("ajax_method.edit",compact("blog"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, Request $request)
    {
        $input = $request->except('_token','_method');
        $input = $this->uploadImage($input,"uploads");
        Blog::where('id',$id)->update($input);
        return response()->json(['status'=>true,'message'=>'Blog was updated successfully.','data'=>$input]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);
        if($blog->delete())
        {
            return response()->json(['status'=>true]);
        }
        else
        {
            return response()->json(['status'=>false]);
        }
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
