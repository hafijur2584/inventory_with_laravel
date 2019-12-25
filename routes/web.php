<?php



Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return redirect('/admin');
});


Route::resource('/admin/category','CategoryController')->except('destroy');
Route::get('/admin/category/delete/{id}','CategoryController@destroy');
Route::resource('/admin/product','ProductController')->except('destroy');
Route::get('/admin/product/delete/{id}','ProductController@destroy');
Route::resource('/admin/supplier','SupplierController')->except('destroy');
Route::get('/admin/supplier/delete/{id}','SupplierController@destroy');