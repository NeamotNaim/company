<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use Illuminate\Support\Carbon;


class AboutController extends Controller
{
    public function index(){
        $home_about=HomeAbout::latest()->paginate(5);
         return view('admin.about.index',compact('home_about'));
    }
    public function add(){
    
        return view('admin.about.create');
    }    

    public function storeAbout(Request $request){
        $validateData=$request->validate([
           'about_title'=>'required|max:255',
           'about_short_des'=>'required',
           'about_long_des'=>'required'
       ],[
           'about_title.required'=>'Please Input About Title',
           'about_short_des.required'=>'Please Input About Short Description',
           'about_long_des.required'=>'Please Input About Long Description',
          
       ]);
       HomeAbout::Insert([
           'title'=>$request->about_title,
           'short_des'=>$request->about_short_des,
           'long_des'=>$request->about_long_des,
           'created_at'=>Carbon::now()
       ]);
       
       return Redirect()->route('allabout')->with('success','About Created Successfully');
    }
    public function edit($id){
       $home_about=HomeAbout::find($id);
       return view('admin.about.edit',compact('home_about'));
   }
   public function AboutUpdate(Request $request,$id){
    //     $validateData=$request->validate([
    //        'about_title'=>'required|max:255',
    //        'about_short_des'=>'required',
    //        'about_long_des'=>'required'
    //    ],[
    //        'about_title.required'=>'Please Input About Title',
    //        'about_short_des.required'=>'Please Input About Short Description',
    //        'about_long_des.required'=>'Please Input About Long Description',
          
    //    ]);
       $home_about=HomeAbout::find($id)->update([
           'title'=>$request->about_title,
           'short_des'=>$request->about_short_description,
           'long_des'=>$request->about_long_description,
           'updated_at'=>Carbon::now(),
       ]);
       return Redirect()->route('allabout')->with('success','About Update Successfully');
   }
   public function delete($id){
       HomeAbout::find($id)->delete();
       return Redirect()->route('allabout')->with('success','About Deleted Successfully');
   }
}
