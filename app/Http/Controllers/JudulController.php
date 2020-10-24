<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Judul;
use App\Steamming;
use App\Algoritma;
use App\Categories;

class JudulController extends Controller
{

    public function index(){
        $categories = Categories::all();
        return view('judul', ['categories' => $categories]);
    }


    public function inputjudul(Request $request){
        $fingerprint_judul = new Judul;
        $text = $request->judul;
        $algoritma = new algoritma;
        $text = $algoritma->Steaming($text);
        $text = $algoritma->hash($text);
        $text = $algoritma->window($text, 3);
        $arrayHasil = array();

        $text = $algoritma->fingerprint($text);

        $idata = 0;
        foreach ($text as $kata) {
            if (!in_array($kata, $arrayHasil)) {
                $arrayHasil[$idata] = $kata;
                $idata++;
            }
        }
        $lengthText = count($arrayHasil);
        for ($i = 0; $i < $lengthText; $i++) {
            $fingerprint_judul->id_categories = $request->id_categories;
            $fingerprint_judul->judul = $request->judul;
            $fingerprint_judul->fingerprint_judul = $arrayHasil[$i];
            $fingerprint_judul->save();
        }
        return redirect('/');
    }
    
}
