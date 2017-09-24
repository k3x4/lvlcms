<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Libraries\MediaConverter;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $products = Product::orderBy('id', 'DESC')->paginate(5);
        return view('admin.products.index', compact('products'))
                        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        
        $product = Product::create($request->except('feature_image'));
        $mediaConverter = new MediaConverter($product);
        $mediaConverter->saveImage($request->input('feature_image'));

        return redirect()->route('admin.products.index')
                        ->with('success','Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $productImage = '';
        $productImageRelative = '';
        
        if($product->hasMedia('original')){
            $productImagePath = $product->getMedia('original')->first()->getUrl();
            $productImageName = basename($productImagePath);
            $productImage = env('APP_URL') . '/images/sizes/' . $productImageName;
            $productImageRelative = '/images/sizes/' . $productImageName;
        }   
        
        return view('admin.products.edit',compact('product', 'productImage', 'productImageRelative'));
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
        $this->validate($request, [
            'title' => 'required'
        ]);

        $product = Product::find($id);
        $product->update($request->except('feature_image'));
        
        $mediaConverter = new MediaConverter($product);
        $mediaConverter->manipulateImage($request->input('feature_image'));

        return redirect()->route('admin.products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('admin.products.index')
                        ->with('success','Product deleted successfully');
    }
    
}
