<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ESSController extends Controller
{
  public function index()
  {
    return view('content.apps.ess-index');
  }
}
