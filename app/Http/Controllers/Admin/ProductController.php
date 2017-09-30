<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Libraries\MediaConverter;
use DB;

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
            'title' => 'required',
            'category' => 'required',
        ]);
        
        //$product = Product::create($request->except('feature_image'));
        
        $product = new Product();
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->save();

        $mediaConverter = new MediaConverter($product);
        $mediaConverter->saveImage($request->input('feature_image'));
        
        //foreach ($request->input('category') as $key => $value) {
            $product->categories()->sync($request->input('category'));
            //$product->attachPermission($value);
        //}

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
        
        $categories = Category::get();
        $productCategories = DB::table("category_product")->where("category_product.product_id", $id)
            ->pluck('category_product.category_id','category_product.category_id')->toArray();
        
        return view('admin.products.edit',compact('product', 'productImage', 'productImageRelative', 'categories', 'productCategories'));
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
            'title' => 'required',
            'category' => 'required',
        ]);

        $product = Product::find($id);
        $product->update($request->except('feature_image'));
        
        $mediaConverter = new MediaConverter($product);
        $mediaConverter->manipulateImage($request->input('feature_image'));
        
        $product->categories()->sync($request->input('category'));

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
