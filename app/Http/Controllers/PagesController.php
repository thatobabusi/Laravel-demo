<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about()
    {
        $first = 'Lorem';
        $last = 'Ipsum';

        //compact looks for a variable with the same name
        return view('pages.about', compact('first', 'last'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
