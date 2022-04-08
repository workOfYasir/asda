<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\products;

use DB;

class productController extends Controller
{
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Return View For Add Product
     */
    public function ajaxProducts()
    {
        $products = Category::with('product')->get();
        return $products;
    }
    public function ajaxProductsApi()
    {
        $products = Category::with('product')->get();
        return response()->json($products);
    }

    public function Add()
    {
        $category=Category::all();
        return view('backend.product.addProduct',['category'=>$category]);
    }


    public function stored(Request $request)
    {

        $this->validate($request, [


            'name'=>'required',
            'category_id'=>'required',
            'unit_price'=>'required',
            'quantity'=>'required'


        ]);

        $products = new Product;
        $products->name = $request->get('name');
        $products->category_id = $request->get('category_id');
        $products->unit = $request->get('unit');
        $products->unit_name = $request->get('unit_name');
        $products->unit_price = $request->get('unit_price');
        $products->quantity = $request->get('quantity');

        $products->save();


        return redirect()->route('display');


    }
    public function display()
    {
        $product = Product::with('category')->get();
        return view('backend.product.showProduct',['product'=>$product]);
    }


    public function remove(Product $product,$id)
    {

        $product=Product::find($id);
        $product->delete();
        return redirect()->route('display');
    }

    public function change(Product $product,$id)
    {

        $product=Product::find($id);
        return view('backend.product.editProduct',['product'=>$product]);


    }


    public function updating(Request $request)
    {

        $UpdateData=Product::where('id', $request->products_id)  // find your user by their email

        ->update(['name' => $request->name,
            'unit' => $request->unit,
            'unit_name' => $request->unit_name,
            'unit_price' => $request->unit_price,
            'quantity' => $request->quantity,

        ]);
        return redirect()->route('display');

    }


}
