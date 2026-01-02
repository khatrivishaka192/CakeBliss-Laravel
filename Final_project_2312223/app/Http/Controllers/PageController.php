<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class PageController extends Controller {
    public function home() { return view('home'); }
    public function cakes() { return view('cakes'); }
    public function contact() { return view('contact'); }
    public function about() {
        return view('about');
    }


    public function contactSubmit(Request $request) {
        // validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // save to database
        Contact::create($request->only('name','email','message'));

        // redirect back with success message
        return back()->with('success','Message sent successfully!');
    }
}
