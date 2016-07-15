<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Vendors;
use App\Products;

class DashboardController extends Controller
{
  public function index()
  {
    $page = [
      'name' => 'Dashboard'
    ];
    return view('dashboard.index', ['page'=>$page]);
  }

  public function vendors()
  {
    $vendors = Vendors::all();

    return view('dashboard.vendors.index', ['vendors'=> $vendors]);
  }

  public function products()
  {
    $products = Products::all();
    return view('dashboard.products.index', ['products'=>$products]);
  }

  public function ingredients()
  {
    return view('dashboard.ingredients');
  }
}
