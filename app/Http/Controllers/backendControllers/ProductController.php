<?php

namespace App\Http\Controllers\backendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\CatProds;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mainManues=Category::whereNull('category_id')->get();
        $hierarchies=CatProds::with('prod','parnt')->get();
        // return $hierarchies;
        // $data = CatProds::
        //     where('category_id', '!=', null)
        // ->whereHas('subCats')
        // ->with('subCats')
        // ->get();
        // return $data;
        // return $hierarchies->parnt->parnt->parnt->parnt['name'];
        return view('backend.products.create',compact('mainManues','hierarchies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $data=$request->all();

        if($request->hasFile('image1')){
            $image1=$request->file('image1');
            $imageName=uniqid().'.'.$image1->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/productImages/');
            $image1->move($destinationPath, $imageName);
            $data['image1']=$imageName;
        }
        if($request->hasFile('image2')){
            $image1=$request->file('image2');
            $imageName=uniqid().'.'.$image1->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/productImages/');
            $image1->move($destinationPath, $imageName);
            $data['image2']=$imageName;
        }
        if($request->hasFile('image3')){
            $image1=$request->file('image3');
            $imageName=uniqid().'.'.$image1->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/productImages/');
            $image1->move($destinationPath, $imageName);
            $data['image3']=$imageName;
        }
        
        $product=Product::create($data);
        foreach($request->category_id as $id){
            CatProds::create([
                "product_id"=>$product->id,
                "category_id"=>$id,
            ]);
        }
        return back()->with('success','Product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
