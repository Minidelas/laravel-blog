<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkController extends Controller
{
  /**
   * Handle submited data or returns form view
   *
   * @return \Illuminate\Http\Response
   */
  public function submit(Request $request)
  {
      if ($request->isMethod('post')) {
          $data = $request->validate([
            'title' => 'required|max:255',
            'url' => 'required|url|max:255',
            'description' => 'required|max:255'
          ]);

          $link = new \App\Link;
          $link->title = $data['title'];
          $link->url = $data['url'];
          $link->description = $data['description'];

          $link->save();

          // $link = tap(new App\Link($data))->save();

          return redirect('/');
      } else {
          return view('submit');
      }
  }
}
