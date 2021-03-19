<?php

namespace App\Http\Controllers\frontendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CatProds;
use App\Models\Product;
use App\Models\User;
use App\Models\Additional_Details;
use App\Models\Company_Detail;
use App\Models\Shipping_Address;
use Illuminate\Support\Facades\Hash;

class WebsiteController extends Controller
{
  
    public function index()
    {
        $categories=Category::whereNull('category_id')->get();
        $products=Product::get();
        // return $products;
        // return $categories[0]->children;
        return view('frontend.home',compact('categories','products'));
        
    }
    public function shop(Request $request){
        
        $categories=Category::whereNull('category_id')->get();
        $cats=CatProds::where('category_id',$request->id)->with('prod')->get();
        
        return view('frontend.shop',compact('categories','cats'));
    }
    
    public function cart(Request $request){
        $products=session('products');
        
        // return $products;
        return view('frontend.cart',compact('products'));
        return 'cartdd';
    }

    public function get_cart(Request $request){
        return session('products');
    }

    public function add_to_cart(Request $request){
        $prod=Product::find($request->id);
        $allproducts=[];
        $grand_total=0;
        $flag=false;
        // session()->flush();
        if(empty(session('products'))){
            session(['products'=>$allproducts,'grand_total'=>$grand_total]);
        }
        $allproducts=session('products');
        $product=Product::find($request->id,["id","name","price","description","image1"]);
        $product['quantity']=1;
        $product['subTotal']=$product->price;
        //  return json_encode($product) ;
        foreach($allproducts as $key=>$value){
            // return json_encode($value);
            if($value['id']==$request->id){
                return 'already exist in your cart';
            }
        }
        array_push($allproducts,$product);
        foreach($allproducts as $key=>$value){
            $grand_total+=$value['price'];
        }
        session(['products'=>$allproducts,'grand_total'=>$grand_total]);
        return $allproducts;
        // return json(['data'=>$allproducts,'gt'=>$grand_total]);

    }


    public function change_quantity(Request $request){
        $allproducts=session('products');
        foreach($allproducts as $key=>$value){
            if($value['id']==$request->id){
                $value['quantity']=$request->quantity;
            }
        }
    }

    public function del_cart_item(Request $request){
        $allproducts=session('products');
        foreach($allproducts as $key=>$value){
            if($value['id']==$request->id){
                $value['quantity']=$request->quantity;
                unset($allproducts[$key]);
            }
        }
        session(['products'=>$allproducts]);
    }

    public function checkout(){
        $allproducts=session('products');
        $grandTotal=0;
        $subTotal=0;
        $totalShippingCharges=0;
        foreach($allproducts as $key=>$value){
            $product=Product::find($value['id']);
          $subTotal= $value['price']*$value['quantity'];
          $grandTotal += $subTotal;
          $totalShippingCharges += $product->shipping_charge;
        }
        $data['total']=$grandTotal;
        $data['shipping']=$totalShippingCharges;
        return view('frontend.checkout',compact('data'));
    }

   
    public function store(Request $request)
    {
        return $request->all();
    }


    public function register(Request $request){
        // return $request->all();
        $numberOfShippingInfo = count($request->street_address1);
        $user=User::create([
            "user_type"=>$request->user_type,
            "name"=>$request->name,
            // "last_name"=>$request->last_name,
            "email"=>$request->email,
            "address_phone"=>$request->phone_number,
            "password"=>hash::make($request->password),
        ]);
        $additionalInfo=Additional_Details::create([
            // "user_id"=>$user->id,
            "how_did_you_here"=>$request->how_did_you_know,
            "best_describe_your_business"=>$request->intrest
        ]);

        for($i=0;$i<$numberOfShippingInfo;$i++){
            // return $i;
            Shipping_Address::create([
                "user_id"=>$user->id,
                "street_address1"=>$request->street_address1[$i],
                "street_address2"=>$request->street_address2[$i],
                "country"=>$request->country[$i],
                "state"=>$request->state[$i],
                "city"=>$request->city[$i],
                "zip"=>$request->zips[$i]
              
            ]);
        }
        if($request->has('company_name')){
           Company_Detail::create([
                "user_id"=>$user->id,
                "company_name"=>$request->company_name,
                "company_website"=>$request->company_website,
                // "company_taxnumber"=>
                // "company_number"
                "street_address1"=>$request->company_street_address1,
                "street_address2"=>$request->company_street_address2,
                // "country"
                "state"=>$request->billing_state,
                "city"=>$request->billing_city,
                "zipcode"=>$request->billing_zip_code

           ]);
        }

        return redirect('/login')->with('you are registerd successfully');
        

        
    }
  
    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        //
    }

 
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}
