<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\products;
use App\Models\Image;
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
        // dd($request->all());
        $this->validate($request, [
            'name'=>'required',
            'category_id'=>'required',
        ]);

        $products = new Product;
        $products->name = $request->get('name');
        $products->save();
        $destinationPath=public_path('images/'.$request->name.$products->id);

        foreach($request->file('images')as $item){
            echo $item;
            $imageName = rand(10,900).'.'.$item->extension();
            $item->move($destinationPath, $imageName);
            $image = new Image;
            $image->product_id= $products->id;
            $image->image= 'images/'.$request->name.$products->id.'/'.$imageName;
            $image->save();
        }

        $products->category()->attach($request->category_id);


        return redirect()->route('display');


    }
    public function display()
    {

        $product = Product::with('category')->with('images')->get();

        return view('backend.product.showProduct',['product'=>$product]);
    }

    /**
     * Param categoryName
     */
    public function categoryProducts($catName)
    {
        $products = Product::whereHas(
            'category', function($q){
                $q->where('category_name', 'Commercial');
            }
        )->with('images')->get();


        return $products;
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
