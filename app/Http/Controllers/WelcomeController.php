<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Show the application welcome view
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
      $links = \App\Link::all();

      return view('welcome', ['links' => $links]);
    }
}
