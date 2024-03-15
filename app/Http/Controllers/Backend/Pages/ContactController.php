<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    public function viewContactInfo()
    {
        $contacts = Contact::latest()->get();
        return view('backend.pages.contact.view-contact-page',compact('contacts'));

    }


    public function contactDetailsInfo($id)
    {
        $contact = Contact::latest()->where('id',$id)->first();
        return view('backend.pages.contact.contact-details-page',compact('contact'));
    }


    public function delete($id)
    {
        $about = Contact::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Information Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }


}
