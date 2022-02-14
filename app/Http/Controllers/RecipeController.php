<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RecipeController extends Controller
{
    public function index()
    {
        // We will use Eloquent builders to get the data
        $recipes = Recipe::all();

        // We will return the view file with data
        return view('recipe.list')->with('recipes', $recipes);
    }

    public function create()
    {
        /* 
        *   We don't need data from database for showing create form
        *   We just need to show the form
````````*/

        // We will return the view file
        return view('recipe.create');
    }

    public function store(Request $request)
    {
        /* 
        *   Since the request will contain images,
        *   we will use Laravel's Storage
````````*/

        $image = $request->file('image');

        /*
        * Laravel comes with many storage disks,
        * located at config/filesystems.php
        */
        $imageName = Storage::disk('public')->put(
            'recipes/',
            $image,
        );

        $recipe = new Recipe();
        $recipe->name = $request->name;
        $recipe->description = $request->description;
        $recipe->image = $imageName;
        $recipe->ingredients = $request->ingredients;
        $recipe->category = $request->category;

        try {
            $recipe->save();
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error($e);
            // Error Handling
        }
    }

    public function edit($recipeId)
    {
        // We will use findOrFail here
        $recipe = Recipe::findOrFail($recipeId);

        // We will return the view file with recipe data
        return view('recipe.edit')->with('recipe', $recipe);
    }

    public function update(Request $request, $recipeId)
    {
        /* 
        *   Update is just a copy of store function with 
        *   little changes
````````*/

        // We will also use findOrFail here
        $recipe = Recipe::findOrFail($recipeId);

        // We will have to check there is new image or not
        $newImage = $request->file('newimage');

        $imageName = $recipe->image;
        if (isset($newImage)) {
            $imageName = Storage::disk('public')->put(
                'recipes/',
                $newImage,
            );

            // We will have to remove old image
            Storage::disk('public')->delete($recipe->image);
        }

        $recipe->name = $request->name;
        $recipe->description = $request->description;
        $recipe->image = $imageName;
        $recipe->ingredients = $request->ingredients;
        $recipe->category = $request->category;

        try {
            $recipe->save();
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error($e);
            // Error Handling
        }
    }

    public function delete($recipeId)
    {
        $recipe = Recipe::find($recipeId);

        /*
        * Note that when deleting a record,
        * make sure to delete related data too
        * In our case, we have to delete recipe image from the storage as well
        */

        Storage::disk('public')->delete($recipe->image);

        try {
            $recipe->delete();
            return redirect()->route('recipe.index');
        } catch (\Exception $e) {
            Log::error($e);
            // Error Handling
        }
    }
}
