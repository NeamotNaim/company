<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Brand;
use  App\Models\multi_images;
use Image;
class BrandController extends Controller
{
   public function __construct(){
         $this->middleware('auth');
    }
   public function index(){
       $brands=Brand::latest()->paginate(5);
       return view('admin.brand.index',compact('brands'));
   }
   public function storeBrand(Request $request){
       $validateData=$request->validate([
           'brand_name'=>'required|max:255|unique:brands',
           'brand_image'=>'required|mimes:png,jpg,jpeg'
       ],[
           'brand_name.required'=>'Please Input Brand Name',
           'brand_image.required'=>'Please Input Brand Image',
           'brand_image.min'=>'Image size should be smaller',
       ]);
       $brand_image=$request->file('brand_image');
       $name_gen=hexdec(uniqid());
       $name_ex=strtolower($brand_image->getClientOriginalExtension());
       $only_name = $brand_image->getClientOriginalName();
       $file_name = pathinfo($only_name, PATHINFO_FILENAME); // file
       $image_name=$name_gen.'_'.strtolower($file_name).'.'.$name_ex;
       $up_location='image/brand/';
       $last_image=$up_location.$image_name;
    //    $brand_image->move($up_location,$image_name);
        // $name_gen=hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        // $last_image='image/brand/'.$name_gen;
        // Image::make($request->file('brand_image')->getRealPath());
       $img=Image::make($request->file('brand_image'))->resize(300, 200)->save($last_image);
       $brand=new Brand;
       $brand->brand_name=$request->brand_name;
       $brand->brand_image=$last_image;
       $brand->save();
       return Redirect()->back()->with('success','Brand Inserted Successfully');
   }

   public function edit($id){
       $brands=Brand::find($id);
       return view('admin.brand.edit',compact('brands'));
   }
   public function update($id,Request $request){
       $validateData=$request->validate([
           'brand_name'=>'required|max:255|unique:brands',
       ],[
           'brand_name.required'=>'Please Input Brand Name',
           'brand_image.required'=>'Please Input Brand Image',
           'brand_image.min'=>'Image size should be smaller',
       ]);

       $old_image=$request->old_image;
       if($request->brand_image==NULL){
             $brand=Brand::find($id);
       $brand->brand_name=$request->brand_name;
       $brand->update();
       return Redirect()->route('allbrand')->with('success','Brand Update Successfully without Image');
       }else{
           unlink($old_image);

       $brand_image=$request->file('brand_image');
       $name_gen=hexdec(uniqid());
       $name_ex=strtolower($brand_image->getClientOriginalExtension());
       $only_name = $brand_image->getClientOriginalName();
       $file_name = pathinfo($only_name, PATHINFO_FILENAME); // file
       $image_name=$name_gen.'_'.strtolower($file_name).'.'.$name_ex;
       $up_location='image/brand/';
       $last_image=$up_location.$image_name;
       $brand_image->move($up_location,$image_name);
       $brand=Brand::find($id);
       $brand->brand_name=$request->brand_name;
       $brand->brand_image=$last_image;
       $brand->update();
       return Redirect()->route('allbrand')->with('success','Brand Update Successfully');
       }
       }
   public function delete($id){
               $old_image=Brand::find($id)->brand_image;
               if($old_image){
                     unlink($old_image);
               }
           Brand::find($id)->delete();
           return Redirect()->back()->with('success','Brand Deleted Successfully');

   }

   //multiimage portion 
   public function multiimageindex(){
       $multi_images=multi_images::latest()->paginate(5);
       
       return view('admin.multiimage.index',compact('multi_images'));
   }
   public function storeMultiimage(Request $request){
        $validateData=$request->validate([
           'multi_image'=>'required'
       ],[
           'multi_image.required'=>'Please Input Multiple Image',
           'multi_image.min'=>'Image size should be smaller',
       ]);
        $multi_image=$request->file('multi_image');
       foreach($multi_image as $image){
       $name_gen=hexdec(uniqid());
       $name_ex=strtolower($image->getClientOriginalExtension());
       $only_name = $image->getClientOriginalName();
       $file_name = pathinfo($only_name, PATHINFO_FILENAME); // file
       $image_name=$name_gen.'_'.strtolower($file_name).'.'.$name_ex;
       $up_location='image/multi/';
       $last_image=$up_location.$image_name;
       $img=Image::make($image)->resize(300, 200)->save($last_image);
       $image=new multi_images;
       $image->image=$last_image;
       $image->save();
       }
       return Redirect()->back()->with('success','Brand Inserted Successfully');
   }
   public function multiimageedit($id){
       $multi_image=multi_images::find($id);
       return view('admin.multiimage.edit',compact('multi_image'));
   }
   public function multiimageupdate($id,Request $request){
       $validateData=$request->validate([
           'multi_image'=>'required',
       ],[
           'multi_image.required'=>'Please Input Multi Image',
           'multi_image.min'=>'Image size should be smaller',
       ]);
       $old_image=$request->old_image;
         unlink($old_image);
         $image=$request->file('multi_image');
       $name_gen=hexdec(uniqid());
       $name_ex=strtolower($image->getClientOriginalExtension());
       $only_name = $image->getClientOriginalName();
       $file_name = pathinfo($only_name, PATHINFO_FILENAME); // file
       $image_name=$name_gen.'_'.strtolower($file_name).'.'.$name_ex;
       $up_location='image/multi/';
       $last_image=$up_location.$image_name;
       $img=Image::make($image)->resize(300, 200)->save($last_image);

       $image=multi_images::find($id);
       $image->image=$last_image;
       $image->update();

       return Redirect()->route('allmultiimage')->with('success','Multi Image Update Successfully');     
       }

       public function multiimagedelete($id){
               $old_image=multi_images::find($id)->image;
               if($old_image){
                     unlink($old_image);
               }
           multi_images::find($id)->delete();
           return Redirect()->back()->with('success','Multi Image Deleted Successfully');

   }
    }
