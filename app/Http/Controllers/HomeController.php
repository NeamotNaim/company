<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Image;

class HomeController extends Controller
{
    //
    public function index(){
        $slider=Slider::latest()->paginate(5);
        return view('admin/slider/index',compact('slider'));
    }
    public function add(){
        return view('admin/slider/create');
    }
    public function storeSlider(Request $request){
        $validateData=$request->validate([
           'slider_title'=>'required|max:255',
           'slider_description'=>'required',
           'slider_image'=>'required|mimes:png,jpg,jpeg'
       ],[
           'slider_title.required'=>'Please Input Slider Title',
           'slider_description.required'=>'Please Input Slider Description',
           'slider_image.required'=>'Please Input Slider Image',
           'slider_image.min'=>'Image size should be smaller',
       ]);
       $slider_image=$request->file('slider_image');
       $name_gen=hexdec(uniqid());
       $name_ex=strtolower($slider_image->getClientOriginalExtension());
       $only_name = $slider_image->getClientOriginalName();
       $file_name = pathinfo($only_name, PATHINFO_FILENAME); // file
       $image_name=$name_gen.'_'.strtolower($file_name).'.'.$name_ex;
       $up_location='image/slider/';
       $last_image=$up_location.$image_name;
       $img=Image::make($request->file('slider_image'))->resize(1920,1088)->save($last_image);
       $slider=new Slider;
       $slider->title=$request->slider_title;
       $slider->description=$request->slider_description;
       $slider->image=$last_image;
       $slider->save();
       return Redirect()->route('allslider')->with('success','Slider Created Successfully');
    }
    public function edit($id){
       $slider=Slider::find($id);
       return view('admin.slider.edit',compact('slider'));
   }
   public function update($id,Request $request){
       $validateData=$request->validate([
           'slider_title'=>'required|max:255',
           'slider_description'=>'required',
           'slider_image'=>'required|mimes:png,jpg,jpeg'
       ],[
           'slider_title.required'=>'Please Input Slider Title',
           'slider_description.required'=>'Please Input Slider Description',
           'slider_image.required'=>'Please Input Slider Image',
           'slider_image.min'=>'Image size should be smaller',
       ]);

       $old_image=$request->old_image;
       if($request->slider_image==NULL){
             $slider=Slider::find($id);
       $slider->title=$request->slider_title;
       $slider->description=$request->slider_description;
       $slider->update();
       return Redirect()->route('allslider')->with('success','Slider Update Successfully without Image');
       }else{
           unlink($old_image);

       $slider_image=$request->file('slider_image');
       $name_gen=hexdec(uniqid());
       $name_ex=strtolower($slider_image->getClientOriginalExtension());
       $only_name = $slider_image->getClientOriginalName();
       $file_name = pathinfo($only_name, PATHINFO_FILENAME); // file
       $image_name=$name_gen.'_'.strtolower($file_name).'.'.$name_ex;
       $up_location='image/slider/';
       $last_image=$up_location.$image_name;
       $slider_image->move($up_location,$image_name);
       $slider=Slider::find($id);
       $slider->title=$request->slider_title;
       $slider->description=$request->slider_description;
       $slider->image=$last_image;
       $slider->update();
       return Redirect()->route('allslider')->with('success','Slider Update Successfully');
       }
       }

       public function delete($id){
               $old_image=Slider::find($id)->image;
               if($old_image){
                     unlink($old_image);
               }
           Slider::find($id)->delete();
           return Redirect()->back()->with('success','Slider Deleted Successfully');
            
      }
    
}
