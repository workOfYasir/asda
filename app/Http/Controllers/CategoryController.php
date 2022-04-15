<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Categorys;
use DB;
// use App\Http\Controllers\str;
use Illuminate\Support\Str;


class CategoryController extends Controller
{

    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Return View For Add Appliences
     */
    public function creates()
    {
        return view('backend.categorys.addCategorys');
    }


    public function stores(Request $request)
    {

        $this->validate($request, [


            'category_name'=>'required',


        ]);

        $Categorys=new Category;
        $Categorys->category_name=$request->get('category_name');
        $Categorys->status=$request->get('status');
        $Categorys->slug=str::slug($request->category_name,'-');


        if($request->get('status')=='on')
        {

            $Categorys->status=1;
        }
        else{

            $Categorys->status=0;
        }
        $Categorys->save();

        return redirect()->route('shows');



    }
    public function index()
    {
        $Category=Category::all();
        return view('backend.categorys.showCategorys',['Category'=>$Category]);
    }


    public function destroys(Category $Category,$id)
    {

        $Category=Category::find($id);
        $Category->delete();
        return redirect()->route('shows');
    }

    public function edit($id)
    {
        $Category=Category::find($id);
        return view('backend.categorys.editCategorys',['category'=>$Category]);

    }


    public function updates(Request $request)
    {

        $UpdateData=Category::where('id', $request->categories_id)  // find your user by their email

        ->update(['category_name' => $request->category_name,

           'slug'=> $request->slug,

        ]);

        return redirect()->route('shows');

    }


    public function changeajaxx(Request $request){

       Category::find($request->id)->update(['status' => $request->status]);
       return response()->json(['success'=>'Status Changes Successfully','status'=>$request->status]);


    }


}
