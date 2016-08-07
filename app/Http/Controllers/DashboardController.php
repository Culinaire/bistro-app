<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
  public function index()
  {
    return view('app.index');
  }

  public function settings()
  {
    return view('app.settings');
  }

  public function profile()
  {
    return view('app.profile');
  }

}
