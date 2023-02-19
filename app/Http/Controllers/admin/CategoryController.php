<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CategoryRequest;
use App\Http\Requests\admin\UpdateCategoryRequest;
use App\Models\Category;
use App\Traits\SlugTrait;
use App\Traits\TranslationTrait;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    use TranslationTrait;
    use SlugTrait;

    public function index()
    {
        $categories = Category::get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.add');
    }

    public function store(CategoryRequest $request)
    {
        try {
            $category = Category::create([
                "name" => $request->input("name"),
                "description" => $request->input("description"),
            ]);
            $input['slug'] = $this->createSlug('Category', $category->id, $category->name, 'categories');
            $this->translate($request, 'Category', $category->id);
            session()->flash('add');
            return redirect()->route("categories.index");
        } catch (\Throwable $e) {
            session()->flash($e->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route("admin.categories.index");
        } else {
            return  view("admin.categories.edit", compact('category'));
        }
    }

    public function update(UpdateCategoryRequest $request,$id)
    {
        try {
            $category = Category::find($id);
            if ($category) {
                $category->name = $request->name;
                $category->description = $request->description;
                $category->daily_rent = $request->daily_rent;
                $category->save();
                
                $this->editSlug('Category', $category->id, $category->name, 'categories');
                $this->editTranslation($request, 'Category', $category->id);
                session()->flash('edit');
                return redirect()->route("categories.index");
            }
        } catch (\Throwable $e) {
            session()->flash($e->getMessage());
            return redirect()->back();
        }
    }


    public function destroy(Request $request)
    {
        Category::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('categories.index');
    }

}
