<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function getRecipes()
    {
        return Recipe::all();
    }

    public function getUserRecipes(Request $request)
    {
        return Recipe::where('user_id', $request->id)->get();
    }

    public function getRecipe(Request $request)
    {
        return Recipe::where('id', $request->id)->get();
    }

    public function editRecipe(Request $request)
    {
        $this->validate($request, [
            'title' => 'bail|required|string|max:50',
            'numOfPeople' => 'bail|required|numeric',
            'cookTime' => 'bail|required|numeric',
            'ingredients' => 'required',
            'instructions' => 'required',
            'image' => 'nullable',
            'user_id' => 'required',
            'difficultyName' => 'required'
        ]);

        Recipe::where('id', $request->id)->update([
            'title' => $request->title,
            'numOfPeople' => $request->numOfPeople,
            'cookTime' => $request->cookTime,
            'ingredients' => $request->ingredients,
            'instructions' => $request->instructions,
            'image' => $request->image,
            'user_id' => $request->user_id,
            'difficultyName' => $request->difficultyName
        ]);
        return response()->json([
            'title' => $request->title, 'numOfPeople' => $request->numOfPeople,
            'cookTime' => $request->cookTime,
            'ingredients' => $request->ingredients,
            'instructions' => $request->instructions,
            'image' => $request->image,
            'user_id' => $request->user_id,
            'difficultyName' => $request->difficultyName
        ]);
    }

    public function saveRecipe(Request $request)
    {

        $this->validate($request, [
            'title' => 'bail|required|string|max:50',
            'numOfPeople' => 'bail|required|numeric',
            'cookTime' => 'bail|required|numeric',
            'ingredients' => 'required',
            'instructions' => 'required',
            'image' => 'nullable',
            'user_id' => 'required',
            'difficultyName' => 'required'
        ]);

        $recipe = Recipe::create([
            'title' => $request->title,
            'numOfPeople' => $request->numOfPeople,
            'cookTime' => $request->cookTime,
            'ingredients' => $request->ingredients,
            'instructions' => $request->instructions,
            'image' => $request->image,
            'user_id' => $request->user_id,
            'difficultyName' => $request->difficultyName
        ]);

        return $recipe;
    }


    // public function deleteImage(Request $request)
    // {
    //     $imageName = $request->imageName;
    //     $this->deleteFileFromServer($imageName);
    //     return 'done';
    // }

    // ne treba nam

    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:jpeg,png,jpg'
        ]);

        $imageName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('uploads'), $imageName);
        return $imageName;
    }
}
