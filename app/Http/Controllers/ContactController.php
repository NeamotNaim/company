<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    //
    public function contact(){
        $contact=Contact::first();
        return view('pages.contact',compact('contact'));
    }
    public function index(){
        $contact=Contact::paginate(15);
        return view('admin.contact.index',compact('contact'));
    }
    public function add(){
        return view('admin.contact.create');
    }
    public function storeContact(Request $request){
        $validateData=$request->validate([
           'contact_address'=>'required|max:255',
           'contact_email'=>'required',
           'contact_phone'=>'required'
       ],[
           'contact_address.required'=>'Please Input Contact Address',
           'contact_email.required'=>'Please Input Contact Email',
           'contact_phone.required'=>'Please Input Contact Phone',
          
       ]);
       $contact=Contact::Insert([
           'address'=>$request->contact_address,
           'email'=>$request->contact_email,
           'phone'=>$request->contact_phone,
           'created_at'=>Carbon::now(),
       ]);
       return Redirect()->route('allcontact')->with('success','Contact Inserted Successfully');
    }

     public function edit($id){
       $contact=Contact::find($id);
       return view('admin.contact.edit',compact('contact'));
   }
   public function ContactUpdate(Request $request,$id){
    //     $validateData=$request->validate([
    //        'about_title'=>'required|max:255',
    //        'about_short_des'=>'required',
    //        'about_long_des'=>'required'
    //    ],[
    //        'about_title.required'=>'Please Input About Title',
    //        'about_short_des.required'=>'Please Input About Short Description',
    //        'about_long_des.required'=>'Please Input About Long Description',
          
    //    ]);
       $contact=Contact::find($id)->update([
           'address'=>$request->contact_address,
           'email'=>$request->contact_email,
           'phone'=>$request->contact_phone,
           'updated_at'=>Carbon::now(),
       ]);
       return Redirect()->route('allcontact')->with('success','Contact Update Successfully');
   }
   public function delete($id){
       Contact::find($id)->delete();
       return Redirect()->route('allcontact')->with('success','Contact Deleted Successfully');
   }
   public function storeMessage(Request $request){
       $validateData=$request->validate([
           'name'=>'required|max:255',
           'email'=>'required',
           'subject'=>'required',
           'message'=>'required'
       ],[
           'name.required'=>'Please Input Your Name ',
           'email.required'=>'Please Input Contact Email',
           'subject.required'=>'Please Input Subject',
           'message.required'=>'Please Input Your Message',
          
       ]);
       $contactForm=ContactForm::Insert([
           'name'=>$request->name,
           'email'=>$request->email,
           'subject'=>$request->subject,
           'message'=>$request->message,
           'created_at'=>Carbon::now(),
       ]);
       return "Your message has been sent. Thank you!";
      
   }
   public function message(){
       $message=ContactForm::paginate(15);
       return view('admin.contact.message',compact('message'));
   }
   public function view($id){
        $message=ContactForm::find($id);
       return view('admin.contact.view',compact('message'));
   }
   public function deleteMessage($id){
       ContactForm::find($id)->delete();
       return Redirect()->route('allmessage')->with('success','Contact Message Deleted Successfully');
   }

}
