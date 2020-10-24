<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('categories');
    }

    public function create(Request $request)
    {
        $categories = new Categories;
        $categories->name = $request->name;
        $categories->save();
        
        if($categories){
            return redirect ('categories/all');
        }
        else {
            return redirect ('categories');
        }
    }

    public function edit($id_categories){
        $categories = Categories::find($id_categories);
        return view('edit_categories', ['categories' => $categories]);
    }

    public function update($id_categories, Request $request){
        $categories = Categories::find($id_categories);        
        $categories->name = $request->name;
        $categories->save();

        if($categories){
            return redirect('categories/all');
        }
        else {
            return redirect ('categories/{id}');
        }
    }
    
    public function delete($id_categories){
        $categories = Categories::find($id_categories);
        $categories->delete();
        return redirect('categories/all');
    }

    public function all(){
        $categories = Categories::all();
        return view('list_categories', ['categories' => $categories]);
    }
}
