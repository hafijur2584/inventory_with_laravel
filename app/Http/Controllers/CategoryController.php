<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $categories = Category::all();
        return view('vendor.multiauth.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.multiauth.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' =>'required'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        if($category){
            $notification = array(
                'message' => 'inserted successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('category.index')->with($notification);
        }else{
            $notification = array(
                'message' => 'Something gone wrong!!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category= Category::where('id',$id)->firstOrFail();
        return view('vendor.multiauth.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' =>'required'
        ]);
        $category = Category::where('id',$id)->firstOrFail();
        $category->name = $request->name;
        $category->save();
        if($category){
            $notification = array(
                'message' => 'Updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('category.index')->with($notification);
        }else{
            $notification = array(
                'message' => 'Something gone wrong!!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('id',$id)->firstOrFail();
        $category->delete();

        if($category){
            $notification = array(
                'message' => 'Deleted successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('category.index')->with($notification);
        }else{
            $notification = array(
                'message' => 'Something gone wrong!!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }
}
