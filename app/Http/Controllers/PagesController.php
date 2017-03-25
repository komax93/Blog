<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex()
    {
        return view('pages.welcome');
    }
    
    public function getAbout()
    {
        $first = "Maksym";
        $last = "Kolesnykov";
        
        $full = $first . " " . $last;
        
        return view('pages.about')->with("fullname", $full);
    }
    
    public function getContact()
    {
        return view('pages.contact');
    }
}
