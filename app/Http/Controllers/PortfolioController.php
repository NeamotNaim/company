<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MultiPic;
use Illuminate\Support\Carbon;
use Image;

class PortfolioController extends Controller
{
    //

    public function index(){
        $portfolio=MultiPic::latest()->paginate(15);
        return view('admin.portfolio.index',compact('portfolio'));
    }
    public function add(){
        return view('admin.portfolio.create');
    }
    public function storePortfolio(Request $request){
        $validateData=$request->validate([
           'portfolio_type'=>'required|max:255',
           
       ],[
           'portfolio_type.required'=>'Please Input portfolio  type',
           'portfolio_image.required'=>'Please Input Portfolio Image',
           'portfolio_image.min'=>'Image size should be smaller',
       ]);

       $multi_image=$request->file('portfolio_image');
       foreach($multi_image as $image){
       $name_gen=hexdec(uniqid());
       $name_ex=strtolower($image->getClientOriginalExtension());
       $only_name = $image->getClientOriginalName();
       $file_name = pathinfo($only_name, PATHINFO_FILENAME); // file
       $image_name=$name_gen.'_'.strtolower($file_name).'.'.$name_ex;
       $up_location='image/portfolio/';
       $last_image=$up_location.$image_name;
       $img=Image::make($image)->save($last_image);
       $image= new MultiPic;
       $image->type=$request->portfolio_type;
       $image->image=$last_image;
       $image->save();
       }
       return Redirect()->route('allportfolio')->with('success','Portfolio Inserted Successfully');

         
       
         

    }
    public function edit($id){
         $portfolio=MultiPic::find($id);
       return view('admin.portfolio.edit',compact('portfolio'));
    }
    public function PortfolioUpdate($id,Request $request){
    //         $validateData=$request->validate([
    //        'portfolio_type'=>'required|max:255',
    //    ],[
    //        'portfolio_type.required'=>'Please Input Portfolio Name',
    //        'portfolio_image.required'=>'Please Input Portfolio Image',
    //        'portfolio_image.min'=>'Image size should be smaller',
    //    ]);
        $old_image=$request->old_image;
       if($request->portfolio_image==NULL){
             $portfolio=MultiPic::find($id);
       $portfolio->type=$request->portfolio_type;
       $portfolio->update();
       return Redirect()->route('allportfolio')->with('success','Portfolio Update Successfully without Image');
       }else{
           unlink($old_image);

       $portfolio_image=$request->file('portfolio_image');
       $name_gen=hexdec(uniqid());
       $name_ex=strtolower($portfolio_image->getClientOriginalExtension());
       $only_name = $portfolio_image->getClientOriginalName();
       $file_name = pathinfo($only_name, PATHINFO_FILENAME); // file
       $image_name=$name_gen.'_'.strtolower($file_name).'.'.$name_ex;
       $up_location='image/portfolio/';
       $last_image=$up_location.$image_name;
    //    $portfolio_image->move($up_location,$image_name);
        $img=Image::make($portfolio_image)->save($last_image);
       $portfolio=MultiPic::find($id)->update([
           'type'=>$request->portfolio_type,
           'image'=>$last_image,
           'updated_at'=>Carbon::now(),
       ]);
    }
       return Redirect()->route('allportfolio')->with('success','Portfolio Update Successfully');

    }
    public function delete($id){
         $old_image=MultiPic::find($id)->image;
               if($old_image){
                     unlink($old_image);
               }
           MultiPic::find($id)->delete();
           return Redirect()->back()->with('success','Portfolio Deleted Successfully');
    }
}
