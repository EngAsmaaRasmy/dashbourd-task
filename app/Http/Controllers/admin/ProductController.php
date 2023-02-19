<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Traits\ImageTrait;
use App\Traits\SlugTrait;
use Illuminate\Http\Request;
use App\Traits\TranslationTrait;

class ProductController extends Controller
{
    use SlugTrait;
    use ImageTrait;
    use TranslationTrait;

    public function index()
    {
        $products = Product::get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('admin.products.add', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        try {
            $image = $this->uploadImage($request->file('image'), "/upload/products");
            $product = Product::create([
                "category_id" => $request->category_id,
                "name" => $request->input("name"),
                "description" => $request->input("description"),
                "image"=> $image
            ]);
            
            $input['slug'] = $this->createSlug('Product', $product->id, $product->name, 'products');
            $this->translate($request, 'Product', $product->id);
            session()->flash('add');
            return redirect()->route("products.index");
        } catch (\Throwable $e) {
            session()->flash($e->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $categories = Category::get();
        $product = Product::find($id);
        return  view("admin.products.edit", compact('categories','product'));
    }

    public function update(ProductRequest $request, $id)
    {
        try {
            $product = Product::find($id);
            if ($product) {
                if ($request->file("image")) {
                    $image = $this->uploadImage($request->file('image'), "/upload/products");
                    $product->image  = $image;
                }
                $product->category_id = $request->category_id;
                $product->name = $request->name;
                $product->description = $request->description;
                $product->save();
                
                $input['slug'] = $this->createSlug('Product', $product->id, $product->name, 'products');
                $this->editTranslation($request, 'Product', $product->id);
                session()->flash('edit');
                return redirect()->route("products.index");
            }
        } catch (\Throwable $e) {
            session()->flash($e->getMessage());
            return redirect()->back();
        }
    }


    public function delete(Request $request)
    {
        Product::findOrFail($request->product_id)->delete();
        session()->flash('delete');
        return redirect()->route('carModels.index');
    }
}
