<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Image;
use App\Models\Career;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\products;

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
    public function detail($id)
    {

        $category = Category::with('product')->get();
        $projects = Product::where('id',$id)->with('images')->get();
        $careers = Career::all();
       
        return view('frontend.pages.project-detail',['projects'=>$projects,'category'=>$category,'careers'=>$careers]);
        
    }
    public function storedImage(Request $request)
    {

        $image = $request->file('file');

        $imageName = time().'.'.$image->extension('');
      $image->move(public_path('images/temp-images'),$imageName);
       $src = asset('images/temp-images/'.$imageName);
        $filename = $_FILES['file']['name'];
        $filesize = $_FILES['file']['size'];

        return response()->json(["filename" => $imageName,"name" => $filename,"size" => $filesize,'src'=>$src]);
    }
    public function stored(Request $request)
    {

        $this->validate($request, [
            'name'=>'required',
            'category_id'=>'required',
        ]);

        $products = new Product;
        $products->name = $request->get('name');
        $products->save();
        $destinationPath=public_path('images/'.$request->name.$products->id);

        foreach($request->file('images')as $item){
            $imageName = rand(10,900).'.'.$item->extension();
            $item->move($destinationPath, $imageName);
            $image = new Image;
            $image->product_id= $products->id;
            $image->image= 'images/'.$request->name.$products->id.'/'.$imageName;
            $image->save();
        }

        $products->category()->attach($request->category_id);


        return redirect()->back();


    }
    public function display()
    {

        $product = Product::with('category')->with('images')->get();
        
        $careers = Career::all();
        return view('backend.product.showProduct',['product'=>$product,'careers'=>$careers]);
    }
    public function show()
    {

        $category = Category::with('product')->get();
        
        $project=Product::with('category')->get();
   
        $careers = Career::all();
        return view('frontend.pages.project-all',['category'=>$category,'project'=>$project,'careers'=>$careers]);
    }

    /**
     * Param categoryName
     */
    public function categoryProducts($catName)
    {
        $products = Product::whereHas(
            'category', function($q) use($catName){
                $q->where('category_name', $catName);
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
