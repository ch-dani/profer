<?php

namespace App\Http\Controllers\backendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{


    public function main_menu(){
        $categories=Category::whereNull('category_id')->get();
        return view('backend.category.index',compact('categories'));
    }

    public function save_mainMenu(Request $request){
        Category::create([
            "name"=>$request->name,
            "description"=>$request->description,
            "status"=>1

        ]);
        return back()->with('success','menu item added successfully');

    }


    public function brands(){
        $menus=Category::whereNull('category_id')->get();
        $brands=Category::where('is_brand',1)->get();
        // return $brands;
        return view('backend.brands.index',compact('menus','brands'));
        return 'save brand';
    }

    public function brand_save(Request $request){
        Category::create([
            "name"=>$request->name,
            "category_id"=>$request->category_id,
            "description"=>$request->description,
            "status"=>1,
            "is_brand"=>1
        ]);
        return back()->with('success','brand added successfully');


    }
    public function sub_brands(Request $request){
        $menus=Category::whereNull('category_id')->get();
        $subbrands=Category::where('is_subbrand',1)->get();
        // return $subbrands;
        return view('backend.subbrands.index',compact('menus','subbrands'));
    }

    public function sub_brand_save(Request $request){
        // return $request->all();
        Category::create([
            "name"=>$request->name,
            "category_id"=>$request->category_id,
            "description"=>$request->description,
            "status"=>1,
            "is_subbrand"=>1
        ]);
        return back()->with('success','subbrand added successfully');


    }

    public function get_sub_brand(Request $request){
        $brands=Category::where('is_brand',1)->where('category_id',$request->id)->get();
        return $brands;
    }
    public function index_models(Request $request){
        $models=Category::where('is_model',1)->get();

        $menus=Category::whereNull('category_id')->get();
        return view('backend.models.index',compact('models','menus'));
    }

    public function allsubbrands(Request $request){
        $data=Category::where('is_subbrand',1)->where('category_id',$request->id)->get();
        return $data;
    }

    public function add_model(Request $request){
        Category::create([
            "name"=>$request->name,
            "category_id"=>$request->category_id,
            "status"=>1,
            "is_model"=>1
        ]);
        return back()->with('success','model added successfully');
        return $request->all();
    }

    // ajax on product add page for get children

    public function get_subs(Request $request){
        // return json_encode($request->all());
        $children= Category::where('category_id',$request->id)->get();
        if(count($children)>0){
            return $children;
        }else{
            return 'no';
        }
    }
    public function get_subbrands(){
        
    }
    public function get_brands(){
        
    }

}
