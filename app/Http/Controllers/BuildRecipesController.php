<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Yaml\Yaml;
use App\Http\Requests;
use App\Recipe;
use Storage;

class BuildRecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $recipes = Recipe::where('type', 'build')->orderBy('name', 'asc')->get();
      return view('recipe.index')->with('recipes', $recipes);
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
      $recipe = Recipe::find($id);
      return view('recipe.show')->with('recipe', $recipe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $recipe = Recipe::find($id);
      return view('recipe.edit')->with('recipe', $recipe);
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
      $input = $request->all();

      $recipe = Recipe::find($id);

      $recipe->name = $input['name'];
      $recipe->slug = $input['slug'];
      $recipe->file = $input['file'];
      $recipe->save();

      return redirect()->route('recipes.index');
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

    public function saveToYaml(Request $request)
    {
      $input = $request->all();
      $recipe = Recipe::find($input['id']);
      $values = [
        'name'=> $recipe->name,
        'slug'=>$recipe->slug,
        'meta'=> $recipe->meta,
        'ingredients'=> $recipe->ingredients,
        'procedures'=> $recipe->procedures,
        'quality'=> $recipe->quality
      ];

      $yaml = Yaml::dump($values);
      $path = 'recipes/generated/'.$recipe->type.'/'.$recipe->slug.'.yml';
      Storage::put($path, $yaml);
      return redirect()->route('app.recipes.batch.show',['id'=>$recipe->id]);
    }

    public function importFromYaml(Request $request)
    {
      $input = $request->all();
      $recipe = Recipe::find($input['id']);
      $path = storage_path('app/recipes/generated/'.$recipe->type.'/'.$recipe->slug.'.yml');
      $file = Yaml::parse(file_get_contents($path));

      $meta = [
        'chit_name' => $file['meta']['chit_name'],
        'cook_time' => $file['meta']['cook_time'],
        'plu' => $file['meta']['plu'],
        'menu_price' => $file['meta']['menu_price'],
        'service_piece' => $file['meta']['service_piece'],
        'togo_spec' => $file['meta']['togo_spec'],
        'menu_type' => $file['meta']['menu_type'],
        'station' => $file['meta']['station'],
        'image' => $file['meta']['image']
      ];

      $recipe->meta = $meta;
      $recipe->ingredients = $file['ingredients'];
      $recipe->procedures = $file['procedures'];
      $recipe->quality = $file['quality'];
      $recipe->save();
      return redirect()->route('app.recipes.build.show',['id'=>$recipe->id]);
    }

    public function readFromYaml()
    {
      $path = 'app/recipes/generated/batch/mornay.yml';
      $file = storage_path($path);
      $yaml = Yaml::parse(file_get_contents($file));
    }
}
