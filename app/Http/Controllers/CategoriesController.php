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
            return redirect ('/');
        }
        else {
            return redirect ('categories');
        }
    }

    public function update(Request $request, $id){
        $name = $request->name;

        $categories = new Categories;
        $categories->name = $name;
        $categories->save();

        if($categories){
            return redirect('/');
        }
        else {
            return redirect ('categories/{id}');
        }
    }
    
    public function delete(Request $request, $id){
        $categories = Categories::find($id);
        $categories->delete();
        return redirect('categories');
    }
}
