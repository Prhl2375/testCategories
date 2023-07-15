<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class SingleCategoryController extends Controller
{
    public function indexAction($id){
        $category = Category::find($id);
        return view('singleCategory', ['category' => $category]);
    }

    public function setInfo(Request $request){
        $data = json_decode($request->getContent());


        $category = Category::find($data->id);
        $category->info = $data->input;
        $category->save();
        return response('success', 200);
    }
}
