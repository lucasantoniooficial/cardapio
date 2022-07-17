<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\RequestCreate;
use App\Http\Requests\Product\RequestUpdate;
use App\Models\Category;
use App\Models\Product;
use App\Services\UploadImageService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $categories = Category::where('status','active')->get();
        return view('admin.product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(
        RequestCreate $request,
        UploadImageService $uploadImageService
    )
    {
        $data = $request->validated();

        $data['photo'] = $uploadImageService->uploadImage($request, 'products');

        Product::create($data);

        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     */
    public function edit(Product $product)
    {
        $categories = Category::where('status','active')->get();
        return view('admin.product.edit', ['categories' => $categories, 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     */
    public function update(
        RequestUpdate $request,
        Product $product,
        UploadImageService $uploadImageService)
    {
        $data = $request->validated();

        $uploadImageService->validateImageUploadedAndDelete($product->photo);

        $path = $uploadImageService->uploadImage($request, 'products');

        if ($path) {
            $data['photo'] = $path;
        }

        $product->update($data);

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     */
    public function destroy(
        Product $product,
        UploadImageService $uploadImageService
    )
    {
        $uploadImageService->validateImageUploadedAndDelete($product->photo);

        $product->delete();

        return back();
    }

}
