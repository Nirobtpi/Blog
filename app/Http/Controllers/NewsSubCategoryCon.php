<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use App\Models\NewsSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NewsSubCategoryCon extends Controller
{
    function index(){
      $categories=  NewsCategory::all();
        return view('backend.add-sub-category',compact('categories'));
    }

    function store(Request $request){

        $request->validate([
            'sub_category_name'=>['required','unique:news_sub_categories,sub_category_name'],
            'category_id'=>['required'],
        ],[
            'sub_category_name.required'=>'Sub Category Name Is Required',
            'sub_category_name.unique'=>'Please Enter Unique Sub Category Name',
            'category_id.required'=>'Category Name Is Required',
        ]);

        NewsSubCategory::create([
            'sub_category_name'=>$request->sub_category_name,
            'category_id'=>$request->category_id,
        ]);

        return back()->with('success','Sub Category Add Successfully');
    }


    function view(){
        $subCategory=NewsSubCategory::orderby('sub_category_name','desc')->with('get_category_name')->simplePaginate(5);

        return view('backend.sub-category-view', compact('subCategory'));
    }

    function updateUrl($id){
        $categories=  NewsCategory::all();
       $data= NewsSubCategory::findOrFail($id);
        return view('backend.edit-sub-category', compact('data','categories'));
    }


    function updateSubCategory(Request $request){
      
        
        $request->validate([
            'sub_category_name'=>['required','unique:news_sub_categories,sub_category_name,'. $request->sub_category_id],
            'category_id'=>['required'],
        ],[
            'sub_category_name.required'=>'Sub Category Name Is Required',
            'sub_category_name.unique'=>'Please Enter Unique Sub Category Name',
            'category_id.required'=>'Category Name Is Required',
        ]);
        // return  $request->sub_category_name;

        NewsSubCategory::findOrFail($request->sub_category_id)->update([
            'sub_category_name'=>$request->sub_category_name,
            'category_id'=>$request->category_id,
            'updated_at'=>Carbon::now(),
        ]);
         return back()->with('success','Data Update Successfully');
    }

    function delete($id){
        NewsSubCategory::findOrFail($id)->delete();
        return back()->with('success','Data Deleted Successfully');
    }

    function restore($id){
        NewsSubCategory::withTrashed()->findOrFail($id)->restore();
        return back()->with('success','Data Restore Successfully!');
    }

    function deletedDataView(){
        $subCategory=NewsSubCategory::orderby('sub_category_name','desc')->with('get_category_name')->onlyTrashed()->simplePaginate(2);

        return view('backend.deleted-sub-category-view', compact('subCategory'));
    }

    function permanentDelete($id){
        NewsSubCategory::onlyTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success','Data Deleted Successfully!');
    }

}
