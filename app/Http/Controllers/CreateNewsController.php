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

      function view(){
       $newsItems=CreateNews::with('get_category','get_sub_category')->get();
         // $subItems=CreateNews::with('get_sub_category')->get();

         return view('backend.view-news', compact('newsItems'));
      }
      function deleteNews($id){
      
         CreateNews::findOrFail($id)->delete();

         return back()->with('success','News Deleted Successfully!');
      }
      function editUrl($id){
         $categories= NewsCategory::all();
         $subCategories= NewsSubCategory::all();
         $data= CreateNews::findOrFail($id);
         return view('backend.edit-news',compact('categories','subCategories','data'));
      }
      function edit(Request $request){
         $slug= strtolower(str_replace(' ','-',$request->slug));
         CreateNews::findOrFail($request->id)->update([
            'news_title'=>$request->news_title,
            'slug'=>$slug,
            'news_category'=>$request->news_category,
            'news_sub_category'=>$request->news_sub_category,
            'sort_description'=>$request->sort_description,
            'description'=>$request->description,
        ]);
        return  back()->with('success','News Updated Successfully!');
      }
      function deletedNewsView(){
        $newsItems= CreateNews::onlyTrashed()->get();

        return view('backend.deleted-news-view',compact('newsItems'));
      }

      function restore($id){
         CreateNews::withTrashed()->findOrFail($id)->restore();

         return back()->with('success','News Deleted Successfully!');
      }

      function forceDeleteNews($id){
         CreateNews::onlyTrashed()->findOrFail($id)->forceDelete();
         return back()->with('success','News Parmanent Deleted Successfully!');
      }
}
