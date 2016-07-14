<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
  public function index()
  {
    $page = [];
    return view('templates.application', ['page'=>$page]);
  }
}
