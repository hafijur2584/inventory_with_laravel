<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use Image;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $products=Product::all();
        return view('vendor.multiauth.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('vendor.multiauth.product.create',compact('categories'));
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
            'code' =>'required',
            'buying_price' =>'required',
            'selling_price' =>'required',
            'supplier' =>'required',
            'godaun' =>'required',
            'buying_date' =>'required',
            'selling_date' =>'required',
            'stock' =>'required',
            'category_id' =>'required',
            'quantity' =>'required',
            'discount' =>'required',
            'image' =>'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->code = $request->code;
        $product->buying_price = $request->buying_price;
        $product->selling_price = $request->selling_price;
        $product->supplier = $request->supplier;
        $product->godaun = $request->godaun;
        $product->buying_date = $request->buying_date;
        $product->selling_date = $request->selling_date;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->quantity = $request->quantity;
        $product->discount = $request->discount;
        $product->user_id = auth('admin')->user()->id;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/images/product/' . $filename);
            $upload_path = 'backend/images/product/';
            Image::make($image)->save($location);
            $product->image = $upload_path.$filename;
        }

        $product->save();
        if($product){
            $notification = array(
                'message' => 'inserted successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('product.index')->with($notification);
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
        $product= Product::where('id',$id)->firstOrFail();
        $categories=Category::all();
        return view('vendor.multiauth.product.edit',compact('product','categories'));
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
            'code' =>'required',
            'buying_price' =>'required',
            'selling_price' =>'required',
            'supplier' =>'required',
            'godaun' =>'required',
            'buying_date' =>'required',
            'selling_date' =>'required',
            'stock' =>'required',
            'category_id' =>'required',
            'quantity' =>'required',
            'discount' =>'required'
        ]);
        $product =Product::where('id',$id)->firstOrFail();
        $product->name = $request->name;
        $product->code = $request->code;
        $product->buying_price = $request->buying_price;
        $product->selling_price = $request->selling_price;
        $product->supplier = $request->supplier;
        $product->godaun = $request->godaun;
        $product->buying_date = $request->buying_date;
        $product->selling_date = $request->selling_date;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->quantity = $request->quantity;
        $product->discount = $request->discount;
        $product->user_id = auth('admin')->user()->id;

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/images/product/');
            //add new photo
            $image->move($location,$filename);
            $location = public_path('backend/images/product/'.$filename);
            $upload_path = 'backend/images/product/';
            Image::make($location)->save($location);
            if(strlen($product->image) > 5 && file_exists(base_path().'/public/'.$product->image)) {
                unlink(base_path().'/public/'.$product->image);
            }
            $product->image = $upload_path.$filename;
        }
        $product->save();
        if($product){
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
        $product = Product::where('id',$id)->firstOrFail();
        $p=$product->image;
        unlink($p);
        $product->delete();

        if($product){
            $notification = array(
                'message' => 'Deleted successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('product.index')->with($notification);
        }else{
            $notification = array(
                'message' => 'Something gone wrong!!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }
}
