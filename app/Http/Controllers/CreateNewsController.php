<?php

namespace App\Http\Controllers;

use App\Models\CreateNews;
use App\Models\NewsCategory;
use App\Models\NewsSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CreateNewsController extends Controller
{
    
      function index(){
       $categories= NewsCategory::all();
       $subCategories= NewsSubCategory::all();
        return view('backend.add-news', compact('categories','subCategories'));
      }

      function create(Request $request){
       $data= $request->thumbnail;
         $slug= strtolower(str_replace(' ','-',$request->slug));


         if ($request->file('thumbnail')) {
            $data= Storage::putFile('thumbnailImage', 
            $request->file('thumbnail'));
         }

         CreateNews::create([
            'news_title'=>$request->news_title,
            'slug'=>$slug,
            'news_category'=>$request->news_category,
            'news_sub_category'=>$request->news_sub_category,
            'sort_description'=>$request->sort_description,
            'description'=>$request->description,
            'thumbnail'=>$data,
         ]);
         return  back()->with('success','News Created Successfully!');
      }
}
