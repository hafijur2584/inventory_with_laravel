<?php

namespace App\Http\Controllers;

use App\Model\Supplier;
use Illuminate\Http\Request;
use Image;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers=Supplier::all();
        return view('vendor.multiauth.supplier.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.multiauth.supplier.create');
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
            'name' =>'required',
            'email' =>'required|unique:suppliers',
            'phone' =>'required|unique:suppliers',
            'address' =>'required',
            'image' =>'required'
        ]);
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/images/supplier/' . $filename);
            $upload_path = 'backend/images/supplier/';
            Image::make($image)->save($location);
            $supplier->image = $upload_path.$filename;
        }

        $supplier->save();
        if($supplier){
            $notification = array(
                'message' => 'inserted successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('supplier.index')->with($notification);
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
        $supplier = Supplier::where('id',$id)->firstOrFail();
        return view('vendor.multiauth.supplier.edit',compact('supplier'));
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
            'name' =>'required',
            'email' =>'required',
            'phone' =>'required',
            'address' =>'required',
            'image' =>'required'
        ]);

        $supplier =Supplier::where('id',$id)->firstOrFail();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/images/supplier/');
            //add new photo
            $image->move($location,$filename);
            $location = public_path('backend/images/supplier/'.$filename);
            $upload_path = 'backend/images/supplier/';
            Image::make($location)->save($location);
            if(strlen($supplier->image) > 5 && file_exists(base_path().'/public/'.$supplier->image)) {
                unlink(base_path().'/public/'.$supplier->image);
            }
            $supplier->image = $upload_path.$filename;
        }
        $supplier->save();
        if($supplier){
            $notification = array(
                'message' => 'updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('product.index')->with($notification);
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
        $supplier = Supplier::where('id',$id)->firstOrFail();
        $p=$supplier->image;
        unlink($p);
        $supplier->delete();

        if($supplier){
            $notification = array(
                'message' => 'Deleted successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('supplier.index')->with($notification);
        }else{
            $notification = array(
                'message' => 'Something gone wrong!!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
