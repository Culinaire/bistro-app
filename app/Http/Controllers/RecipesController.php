<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Symfony\Component\Yaml\Yaml;
use App\Http\Requests;
use App\Recipes;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $recipes = Recipes::all();
      return view('dashboard.recipes.index', ['recipes'=>$recipes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $recipe = Recipes::find($id);
      return view('dashboard.recipes.single', ['recipe'=>$recipe]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function import($id)
    {
      $recipe = Recipes::find($id);
      //$yaml = new Yaml;
      $path = storage_path('recipes/'.$recipe->type."/".$recipe->slug.".yml");
      echo $path;
      $yaml = Yaml::parse(file_get_contents($path));
      print_r($yaml['name']);

      //$recipe->name = $yaml['name'];
      $recipe->slug = str_slug($yaml['name']);
      $recipe->meta = $yaml['meta'];
      $recipe->ingredients = $yaml['ingredients'];
      $recipe->procedures = $yaml['procedures'];
      $recipe->quality = $yaml['quality'];
      $recipe->save();
    }
}
