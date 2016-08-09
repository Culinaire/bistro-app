<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Recipe;
use Symfony\Component\Yaml\Yaml;
use Storage;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $recipes = Recipe::orderBy('name', 'asc')->get();
      return view('recipe.index')->with('recipes', $recipes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('recipe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $input = $request->all();

      $recipe = new Recipe;
      $recipe->name = $input['name'];
      $recipe->slug = str_slug($input['name']);
      $recipe->type = $input['type'];
      $recipe->save();

      return redirect()->route('recipes.index');
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

      echo "<pre>";
      print_r($input);
      echo "</pre>";
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

          $meta = [];

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
          }

          if ($recipe->type == 'build') {
            $meta = [
              'chit_name' => $file['chit_name'],
              'cook_time' => $file['cook_time'],
              'plu' => $file['plu'],
              'menu_price' => $file['menu_price'],
              'service_piece' => $file['service_piece'],
              'togo_spec' => $file['togo_spec'],
              'menu_type' => $file['menu_type'],
              'station' => $file['station'],
              'image' => $file['image']
            ];
          }
          $recipe->meta = $meta;


        }
        $recipe->save();
      }
      return redirect()->route('recipes.index')->with('status', 'Recipes Imported Successfully!');
    }

    public function scan()
    {
      $batches = Storage::files('recipes/originals/batch');

      foreach ($batches as $batch) {

        $file = Yaml::parse(Storage::get($batch));

        $slug = basename($batch,'.yml');

        $recipe = Recipe::firstOrNew(['slug' => $slug ]);

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

        $recipe->name = $file['name'];

        $recipe->slug = $slug;

        $recipe->type = "batch";

        $recipe->meta = $meta;

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

        $recipe->file = $batch;
        $recipe->save();
      }

      $builds = Storage::files('recipes/originals/build');

      foreach ( $builds as $build ) {
        $file = Yaml::parse(Storage::get($build));
        $slug = basename($build,'.yml');
        $recipe = Recipe::firstOrNew(['slug' => $slug ]);
        $recipe->name = $file['name'];
        $recipe->slug = $slug;
        $recipe->type = "build";

        $meta = [
          'chit_name' => $file['chit_name'],
          'cook_time' => $file['cook_time'],
          'plu' => $file['plu'],
          'menu_price' => $file['menu_price'],
          'service_piece' => $file['service_piece'],
          'togo_spec' => $file['togo_spec'],
          'menu_type' => $file['menu_type'],
          'station' => $file['station'],
          'image' => $file['image']
        ];

        $recipe->meta = $meta;

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

        $recipe->file = $build;
        $recipe->save();

      }

    }
}
