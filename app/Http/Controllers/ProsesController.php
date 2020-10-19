<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fingerprints;
use App\Steamming;
use App\Algoritma;


class ProsesController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        $fingerprints = new fingerprints;
        $text = $request->abstrak;
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
            $fingerprints->abstrak = $request->abstrak;
            $fingerprints->fingerprint = $arrayHasil[$i];
            $fingerprints->save();
        }
        return redirect('/');
    }
}
