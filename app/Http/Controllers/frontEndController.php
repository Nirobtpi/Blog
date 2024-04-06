<?php

namespace App\Http\Controllers;

use App\Models\CreateNews;
use App\Models\NewsCategory;
use App\Models\NewsSubCategory;
use Illuminate\Http\Request;

class frontEndController extends Controller
{
    // function fornend(){
    // //    $all= CreateNews::get();
    //     return back('frontend.index');
    // }
    function fornendData(){
        $subCat=NewsSubCategory::all();
        $categories=NewsCategory::get();
       $all= CreateNews::get();
        return view('frontend.index', compact('all','categories','subCat'));
    }

    function singleNews($slug,$id){
        
       $single= CreateNews::findOrFail($id);

       return view('frontend.single-news',compact('single'));
    }
    function category_link($category_name,$category_id){
        $news= NewsCategory::findOrFail($category_id);
        $all= CreateNews::where('news_category',$news->id)->get();
       return view('frontend.category',compact('news','all'));
    }

    function getSubCategory($name,$id){
     
       $subCat=NewsSubCategory::findOrFail($id);
       $all=CreateNews::where('news_sub_category',$subCat->id)->get();
      return view('frontend.sub-category',compact('subCat','all'));
    }
}
