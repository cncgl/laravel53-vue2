<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Debugbar;

class SampleController extends Controller
{
  /**
   * Create a new controller instance.
   *
   */
  public function __construct()
  {
    // とりあえず外す
    // $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    Debugbar::info('sample');
    return view('sample');
  }
}
