<?php

namespace App\Http\Controllers\Admin\Categories;

use App\DataTables\Category\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\CategoryRequest;
use App\Models\Category as ModelsCategory;
use App\Traits\Seoable;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *inv prefic 0ecom
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryDataTable $categoryDataTable)
    {
        return $categoryDataTable->render('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::getTree();
        $category = new Category();

        return view('admin.category.create', compact('categories','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$category->seos()::create([
              //'keyword'  => $request->keyword,

              //'meta_description' =>$request->meta_description,

        //]);
        $category = new Category(
              $request->all()
        );
        $category->seos()->create($request->only(['keyword', 'description', 'title']));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
             $entries = Category::whereIn('id', $request->input('ids'))->get();
             foreach ($entries as $entry){
                 $entry->delete();
             }
        }
    }

    public function restore($id)
    {
        $category = Category::onlyTrashed()->firstOrFail($id);
        $category->restore();
        return redirect()->route('admin.catagory.index')->with('success', __('category successed restore'));
    }

    public function forceDelete($id)
    {
           $catagory = Category::onlyTrashed()->firstOrFail($id);
           $catagory->forceDelete();

           return redirect()->route('admin.category.index')->with('success', __('catagory.successfully deleted'));
    }
}
