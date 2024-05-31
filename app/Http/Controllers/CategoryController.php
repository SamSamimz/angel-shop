<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryPostRequest;
use App\Http\Requests\CategoryPutRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;

class CategoryController extends Controller
{

    public function __construct(public CategoryService $categoryService)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $categories =  $this->categoryService->categoryList();
        return view('admin.category.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryPostRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->name);
        $data['status'] = $request->status ? 1 : 0;
        $data['popular'] = $request->popular ? 1 : 0;
        if($request->hasFile('image')) {
            $fileName = 'category_' . $data['slug']. '_.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('categories',$fileName,'public');
            $data['image'] = $fileName;
        }
        Category::create($data);
        $this->success('Category created successfully');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if($category) {
            return view('admin.category.edit_category',compact('category'));
        }abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryPutRequest $request, Category $category)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->name);
        $data['status'] = $request->status ? 1 : 0;
        $data['popular'] = $request->popular ? 1 : 0;
        if($request->hasFile('image')) {
            if($category->image && file_exists(public_path('storage/categories/'.$category->image))) {
                unlink(public_path('storage/categories/'.$category->image));
            }
            $fileName = 'category_' . $data['slug']. '_.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('categories',$fileName,'public');
            $data['image'] = $fileName;
        }
        $category->update($data);
        $this->success('Category updated successfully');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->image && file_exists(public_path('storage/categories/'.$category->image))) {
            unlink(public_path('storage/categories/'.$category->image));
        }
        $category->delete();
        $this->success('Category deleted successfully');
        return redirect()->route('categories.index');
    }

    protected function success($text) {
        flash()
        ->options([
            'timeout' => 2000,
            'position' => 'bottom-right',
        ])->success($text);
    }

}
