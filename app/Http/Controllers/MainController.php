<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function indexAction(){
        $categories = Category::all();

        foreach ($categories as $category){
            $k = 0;
            for ($i = 0; $i < $categories->count(); $i++){
                if($categories[$i]->parent_id == $category->id){
                    $k++;
                }
            }
            $category->numOfChilds = $k;
        }

        return view("welcome", ['data' => $categories]);
    }

    private function treeCategoryClean($categories, $id){
        foreach ($categories as $category){
            if($category->parent_id == $id){
                if($category->numOfChilds){
                    $this->treeCategoryClean($categories, $category->id);
                }
                Category::destroy($category->id);
            }
        }
        Category::destroy($id);
    }


    public function deleteCategoryAction(Request $request){
        $id = json_decode($request->getContent())->id;
        $categories = Category::all();
        foreach ($categories as $category){
            $k = 0;
            for ($i = 0; $i < $categories->count(); $i++){
                if($categories[$i]->parent_id == $category->id){
                    $k++;
                }
            }
            $category->numOfChilds = $k;
        }
        $this->treeCategoryClean($categories, $id);
        return response('success', 200);
    }

    public function editCategoryAction(Request $request){
        $data = json_decode($request->getContent());

        $category = Category::find($data->id);

        $category->name = $data->input;

        $category->save();

        return response('success', 200);
    }


    public function addCategoryAction(Request $request){
        $data = json_decode($request->getContent());

        $category = new Category();
        $category->parent_id = $data->id;
        $category->name = $data->input;
        $category->save();
        return response('success', 200);
    }
}
