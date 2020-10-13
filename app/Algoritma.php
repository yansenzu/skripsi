<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\katadasar;
use App\Steamming;

class Algoritma extends Model
{
    public function Steaming($text)
    {
        $pre = new Steamming();
        $text = $pre->hapusTandaBaca($text);
        $text = $pre->hapusTandaSimbol($text);
        $text = $pre->hapusAngka($text);
        $text = $pre->konversiKeHurufKecil($text);
        $text = $pre->hapusKataSambung($text);
        $text = $pre->memecahKata($text);

        $count = count($text);

        for ($i = 0; $i < $count; $i++) {
            $kata = $text[$i];
            $kata = $pre->hapusPartikel($kata);
            $kata = $pre->hapusKataGantiMilik($kata);
            $kata = $pre->hapusAwalanPertama($kata);
            $kata = $pre->hapusAwalanKedua($kata);
            $kata = $pre->hapusAkhiran($kata);
            $text[$i] = $kata;
        }

        $text = $pre->susunKata($text);
        // $text=$pre->hapusPartikel($text);
        return $text;
    }


    public function Kgram($text)
    {
        $pre = new Steamming();
        $text = $pre->hapusSpasi($text);
        $array_string = array();
        $i = 0;
        $count = strlen($text);
        while ($i <= ($count - 3)) {
            $array_string[$i] = substr($text, $i, 3);
            $i++;
        }
        return $array_string;
    }
    function hash($text)
    {
        $array_hash = array();
        $array_kata = algoritma::Kgram($text);
        $count = count($array_kata);
        for ($i = 0; $i < $count; $i++) {
            $data_string = $array_kata[$i];
            for ($j = 0; $j < 5; $j++) {
                $ascii[$j] = ord(substr($data_string, $j, 1));
            }
            $array_hash[$i] = ($ascii[0] * pow(9, 2) + $ascii[1] * pow(9, 1) + $ascii[2] * pow(9, 0));
        }
        return $array_hash;
    }
    function window($array, $window)
    {
        $arrayWindow = array();
        $index = 0;
        $awal = 0;
        for ($i = 0; $i < count($array) - $window + 1; $i++) {
            $index = $awal;
            for ($j = 0; $j < $window; $j++) {
                $arrayWindow[$i][$j] = $array[$index];
                $index++;
            }
            $awal++;
        }
        return $arrayWindow;
    }
    function fingerprint($array)
    {
        $finger = array();
        $i = 0;
        foreach ($array as $obj) {
            $finger[$i] = min($obj);
            $i++;
        }
        return $finger;
    }
    function similarity($finger1, $finger2)
    {
        $finger_sama = 0;
        foreach ($finger1 as $h1) {
            foreach ($finger2 as $h2) {
                if ($h1 == $h2) {
                    $finger_sama++;
                    break;
                }
            }
        }
        $finger_merge = array_merge($finger1, $finger2);
        $finger_unik = array_unique($finger_merge);
        $total_finger_unik = count($finger_unik);
        $jaccard_coefficient = ($finger_sama / $total_finger_unik) * 100;
        return $jaccard_coefficient;
    }
}
