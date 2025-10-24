<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller {
    public function home() { return view('home'); }
    public function cakes() { return view('cakes'); }
    public function contact() { return view('contact'); }
    public function contactSubmit(Request $r) {
        // temporary: just redirect back with success message
        return back()->with('success','Message sent (demo).');
    }
}
