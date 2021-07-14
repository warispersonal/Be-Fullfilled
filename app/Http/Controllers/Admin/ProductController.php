<?php

namespace App\Http\Controllers\Admin;

use App\Constant\FileConstant;
use App\Constant\ProjectConstant;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GenericController;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(ProjectConstant::TOTAL_WEB_PAGINATION);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('admin.product.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $image = GenericController::saveImage($request, 'file', FileConstant::PRODUCTS_IMAGES);
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->ingredient = $request->ingredient;
        $product->image_id = $image->id ?? null;
        $product->product_code = $request->product_code;
        $product->save();
        $product->tags()->attach($request->tags);
        return redirect()->route('manage_store')->with('success_message', 'Product successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $tags = Tag::all();
        return view('admin.product.edit', compact('tags', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($request->has('file')) {
            $this->removeImage(FileConstant::PRODUCTS_IMAGES, $product->image_id);
            $image = GenericController::saveImage($request, 'file', FileConstant::PRODUCTS_IMAGES);
            $product->image_id = $image->id ?? null;
        }
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->ingredient = $request->ingredient;
        $product->product_code = $request->product_code;
        $product->save();
        $product->tags()->detach();
        $product->tags()->attach($request->tags);
        return redirect()->route('manage_store')->with('success_message', 'Product successfully update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $this->removeImage(FileConstant::PRODUCTS_IMAGES, $product->image_id);
            $product->tags()->detach();
            $product->delete();
        }
        return redirect()->route('manage_store')->with('success_message', 'Product successfully destroy');
    }
}
