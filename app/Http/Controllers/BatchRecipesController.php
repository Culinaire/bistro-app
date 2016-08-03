<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Yaml\Yaml;
use App\Http\Requests;
use App\Recipe;
use Storage;

class BatchRecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $recipes = Recipe::where('type', 'batch')->orderBy('name', 'asc')->get();
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

      //echo "<pre>";
      //print_r($input);
      //print_r($recipe);
      //echo "</pre>";

      //echo $input['yield']['uom'];



      $recipe->name = $input['name'];
      $recipe->slug = $input['slug'];
      $recipe->file = $input['file'];
      $recipe->yield_qty = $input['yield']['qty'];
      $recipe->yield_uom = $input['yield']['uom'];
      $recipe->save();

      //return redirect()->route('recipes.index');
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

    public function import()
    {
      $recipes = Recipe::all();

      foreach ($recipes as $recipe) {

        if(!isset($recipe->slug)) {
          $recipe->slug = str_slug($recipe->name);
        }


        $file = storage_path('recipes/'.$recipe->type.'/'.$recipe->slug.'.yml');

        if(file_exists($file)) {
          $recipe->file = $file;

          $yaml = new Yaml;
          $file = $yaml->parse(file_get_contents($recipe->file));

          $recipe->ingredients = $file['ingredients'];

          if(isset($file['procedures'])) {
            $recipe->procedures = $file['procedures'];
          } else {
            $recipe->procedures = [];
          }

          if(isset($file['quality'])) {
            $recipe->quality = $file['quality'];
          } else {
            $recipe->quality = [];
          }

          if($recipe->type == 'batch') {
            $meta = [
              'yield' => [
                'qty' => $file['yield']['qty'],
                'uom' => $file['yield']['uom']
              ],
              'prep_time' => [
                'active' => $file['prep_time']['active'],
                'inactive'  => $file['prep_time']['inactive']
              ],
              'category' => $file['meta']['category']
            ];

            $recipe->meta = $meta;
          }

        }
        $recipe->save();
      }
      return redirect()->route('recipes.index')->with('status', 'Recipes Imported Successfully!');
    }

    public function saveToYaml(Request $request)
    {
      $input = $request->all();
      //print_r($input);

      $recipe = Recipe::find($input['id']);
      $values = [
        'name'=> $recipe->name,
        'slug'=>$recipe->slug,
        'meta'=> $recipe->meta,
        'ingredients'=> $recipe->ingredients,
        'procedures'=> $recipe->procedures,
        'quality'=> $recipe->quality
      ];

      $array = (array) $recipe;
      $yaml = Yaml::dump($values);
      //$path = storage_path('recipes/generated/'.$recipe->type.'/'.$recipe->slug.'.yml');
      $path = 'recipes/generated/'.$recipe->type.'/'.$recipe->slug.'.yml';
      //$contents = file_put_contents($path, $yaml);
      Storage::put($path, $yaml);
      //return redirect()->route('recipes.batch.index');
      return redirect()->route('recipes.batch.show',['id'=>$recipe->id]);
    }

    public function importFromYaml(Request $request)
    {
      $input = $request->all();
      $recipe = Recipe::find($input['id']);
      $path = storage_path('app/recipes/generated/'.$recipe->type.'/'.$recipe->slug.'.yml');
      $file = Yaml::parse(file_get_contents($path));

      $meta = [
        'yield' => [
          'qty' => $file['meta']['yield']['qty'],
          'uom' => $file['meta']['yield']['uom']
        ],
        'prep_time' => [
          'active' => $file['meta']['prep_time']['active'],
          'inactive'  => $file['meta']['prep_time']['inactive']
        ],
        'category' => $file['meta']['category']
      ];

      $recipe->meta = $meta;
      $recipe->ingredients = $file['ingredients'];
      $recipe->procedures = $file['procedures'];
      $recipe->quality = $file['quality'];
      $recipe->save();
      return redirect()->route('recipes.batch.show',['id'=>$recipe->id]);
    }

    public function readFromYaml()
    {
      $path = 'app/recipes/generated/batch/mornay.yml';
      $file = storage_path($path);
      $yaml = Yaml::parse(file_get_contents($file));
    }
}
