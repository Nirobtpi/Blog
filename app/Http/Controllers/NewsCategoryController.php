<?php

namespace App\Http\Controllers;

// use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\NewsCategory;



class NewsCategoryController extends Controller
{
    
    function catUrl(){
        return view('backend.news-category');
    }

    function insertCategory(Request $request){
        $request->validate([
            'category_name'=>['required','unique:news_categories,category_name,'] //.$id editb ar jorno
        ],[
            'category_name.required'=>'Category Name Is Required',
            'category_name.unique'=>'Category Name All Reeady Used',
        ]);

        NewsCategory::create([
          'category_name'=>$request->category_name,
        ]);

        return back()->with('success','Category Create Successfully');

    }

    function viewCategoryUrl(){
        $categories=NewsCategory::orderby('category_name','asc')->simplePaginate('4');
        return view('backend.news-category-view', compact('categories'));
    }

    function deleteCategory($id){
        NewsCategory::findOrFail($id)->delete();

        return back()->with('success','Category Deletd Successfully!');
    }
    function deleteCategoryView(){
       $categories= NewsCategory::onlyTrashed()->get();

        return view('backend.deletednews-category-view', compact('categories'));
    }
    function editCategoryurl($id){
        $getValue=NewsCategory::findOrFail($id);
        return view('backend.edit-news-category',compact('getValue'));
    }

    function editCategory(Request $request){
        $request->validate([
            'category_name'=>['required','unique:news_categories,category_name,'.$request->category_id] //.$id editb ar jorno
        ],[
            'category_name.required'=>'Category Name Is Required',
            'category_name.unique'=>'Category Name All Reeady Used',
        ]);

        NewsCategory::findOrFail($request->category_id)->update([
            'category_name'=>$request->category_name,
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('success','Data Updated Successfully');
    }
    function restore($id){
       NewsCategory::withTrashed()->findOrFail($id)->restore();

        return back()->with('success','Category Deletd Successfully!');
    }

    function permanentDelete($id){
        NewsCategory::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success','Data Deleted Parmanently !');
    }

}
