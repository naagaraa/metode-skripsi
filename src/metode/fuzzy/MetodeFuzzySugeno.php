<?php
/**
 * @author      Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa metode skripsi Fuzzy sugeno
 * @license     MIT public license
 */
namespace Nagara\Src\Metode;

class MetodeFuzzySugeno {

    // check ype kurva
    public function kurva($type_kurva = "segitiga", $arah = "kanan", $a = 1, $b = 1, $c = 1, $x = 1)
    {
       if ($type_kurva == "segitiga") {
            // echo "kurva segitiga<br>";
            return self::kurva_segitiga($arah, $a, $b, $c, $x);
       } elseif($type_kurva == "bahu") {
            // echo "kurva bahu<br>";
            return self::kurva_bahu($arah, $a, $b, $c, $x);
       } else{
           echo "kurva model dan arah tidak dikenali";
       }
    }

    // kurava bahu jurnal 2
    public function kurva_bahu($arah = "kiri", $a = 1, $b= 1, $c = 1, $x = 1)
    {
        $ux;
        switch ($arah) {
            // representasi kurva bahu model kiri
            case 'kiri':
                if ($x <= $a) {
                    echo "kurva bahu kiri kondisi 1<br>";
                    $ux = 0;
                }elseif(($a <= $x) and ($x <= $b)){
                    echo "kurva bahu kiri kondisi 2<br>";
                    $h1 = $b - $x;
                    $h2 = $b - $a;
                    $ux = $h1 / $h2;
                }elseif($x >= $b){
                    echo "kurva bahu kiri kondisi 3<br>";
                    $ux = 1;
                }else{
                    $ux = "angka tidak ada yg memenuhi syarat kondisi";
                }
                break;

            // representasi kurva bahu model kanan
            case 'kanan':
                if ($x <= $b) {
                    echo "kurva bahu kanan kondisi 1<br>";
                    $ux = 0;
                }elseif(($b <= $x) and ($x <= $c)){
                    echo "kurva bahu kanan kondisi 2<br>";
                    $h1 = $x - $b;
                    $h2 = $c - $b;
                    $ux = $h1/$h2;
                }elseif($x >= $c){
                    echo "kurva bahu kanan kondisi 3<br>";
                    $ux = 1;
                }else{
                    $ux = "angka tidak ada yg memenuhi syarat kondisi";
                }
                break;
            
            default:
                # code...
                echo "arah kurva bahu tidak dikenali";
                break;
        }

        return $ux;
        
    }

    // kurva segitiga jurnal 2
    public function kurva_segitiga($arah = "kiri", $a = null, $b= null, $c = null, $x = null)
    {
        $ux = null;
        switch ($arah) {
            // representasi kurva segitiga model kiri
            case 'kiri':
                if (($x <= $a) or ($x >= $c)) {
                    echo "kurva segitiga kiri kondisi 1<br>";
                    $ux = 0;
                }elseif(($a <= $x) and ($x < $b)){
                    echo "kurva segitiga kiri kondisi 2<br>";
                    $h1 = $x - $a;
                    $h2 = $b - $a;
                    $ux = $h1 / $h2;
                }elseif(($b < $x) and ($x < $c)){
                    echo "kurva segitiga kiri kondisi 3<br>";
                    $h1 = $c - $x;
                    $h2 = $c - $b;
                    $ux = $h1 / $h2;
                }else{
                    $ux = "angka tidak ada yg memenuhi syarat kondisi";
                }
                break;

            // representasi kurva segitiga model kanan
            case 'kanan':
                if (($x <= $b) or ($x <= $a)) {
                    echo "kurva segitiga kanan kondisi 1<br>";
                    $ux = 0;
                }elseif(($b <= $x) and ($x <= $a)){
                    echo "kurva segitiga kanan kondisi 2<br>";
                    $h1 = $x - $a;
                    $h2 = $b - $a;
                    $ux = $h1/$h2;
                }elseif(($a >= $x) and ($x <= $b)){
                    echo "kurva segitiga kanan kondisi 3<br>";
                    $h1 = $b - $x;
                    $h2 = $a - $b;
                    $ux = $h1/$h2;
                }else{
                    $ux = "angka tidak ada yg memenuhi syarat kondisi";
                }
                break;
            
            default:
                # code...
                echo "arah kurva segitiga tidak dikenali";
                break;
        }

        return $ux;
    }

    // kurva model kurang
    public function U_Low($x = 1)
    {
        // nilai constant sudah ditetapkan
        if (($x <= 1) or ($x >= 3)) {
            // echo "kurva segitiga low kondisi 1<br>";
            $ux = 0;
        }elseif((1 <= $x) and ($x <= 2)){
            // echo "kurva segitiga low kondisi 2<br>";
            $h1 = $x - 1;
            $h2 = 2 - 1;
            $ux = $h1 / $h2;
        }elseif((2 <= $x) and ($x <= 3)){
            // echo "kurva segitiga low kondisi 3<br>";
            $h1 = 2 - $x;
            $h2 = 3 - 2;
            $ux = $h1 / $h2;
        }else{
            $ux = "angka tidak ada yg memenuhi syarat kondisi";
        }

        return $ux;
    }

    // kurva model cukup
    public function U_Middle($x = 1)
    {
       // nilai constant sudah ditetapkan
        if (($x <= 2) or ($x >= 4)) {
            // echo "kurva segitiga middle kondisi 1<br>";
            $ux = 0;
        }elseif((2 <= $x) and ($x <= 3)){
            // echo "kurva segitiga middle kondisi 2<br>";
            $h1 = $x - 2;
            $h2 = 3 - 2;
            $ux = $h1 / $h2;
        }elseif((3 <= $x) and ($x <= 4)){
            // echo "kurva segitiga middle kondisi 3<br>";
            $h1 = 3 - $x;
            $h2 = 4 - 3;
            $ux = $h1 / $h2;
        }else{
            $ux = "angka tidak ada yg memenuhi syarat kondisi";
        }

        return $ux;
    }

    // kurva model U baik
    public function U_Hight($x = 1)
    {
        // nilai constant sudah ditetapkan
        if (($x <= 3) or ($x >= 5)) {
            // echo "kurva segitiga hight kondisi 1<br>";
            $ux = 0;
        }elseif((3 <= $x) and ($x <= 4)){
            // echo "kurva segitiga hight kondisi 2<br>";
            $h1 = $x - 3;
            $h2 = 4 - 3;
            $ux = $h1 / $h2;
        }elseif((4 <= $x) and ($x <= 5)){
            // echo "kurva segitiga hight kondisi 3<br>";
            $h1 = 5 - $x;
            $h2 = 5 - 4;
            $ux = $h1 / $h2;
        }else{
            $ux = "angka tidak ada yg memenuhi syarat kondisi";
        }

        return $ux;
    }

    // defuzifikasi sugeno
    public function Defuzifikasi($arr_motif = [], $arr_konsep = [], $arr_pengetahuan = [], $arr_keterampilan = [])
    {
        // get value kecuali 0
        $except = array(0);
        
        // hitung jumlah duplicate 0
        $zero_duplicate_motif = count(array_diff_assoc($arr_motif, array_unique($except)));
        $zero_duplicate_konsep = count(array_diff_assoc($arr_konsep, array_unique($except)));
        $zero_duplicate_pengetahuan = count(array_diff_assoc($arr_pengetahuan, array_unique($except)));
        $zero_duplicate_keterampilan = count(array_diff_assoc($arr_keterampilan, array_unique($except)));

        // check duplicate zero
        if ($zero_duplicate_motif < 3) {
            $hasil_min_motif = min($arr_motif);
        }else{
            $hasil_min_motif = min(array_values(array_diff($arr_motif, $except)));
        }

        // check duplicate zero
        if ($zero_duplicate_konsep < 3) {
            $hasil_min_konsep = min($arr_konsep);
        }else{
            $hasil_min_konsep = min(array_values(array_diff($arr_konsep, $except)));
        }

        // check duplicate zero
        if ($zero_duplicate_pengetahuan < 3) {
            $hasil_min_pengetahuan = min($arr_konsep);
        }else{
            $hasil_min_pengetahuan = min(array_values(array_diff($arr_pengetahuan, $except)));
        }

        // check duplicate zero
        if ($zero_duplicate_keterampilan < 3) {
            $hasil_min_keterampilan = min($arr_pengetahuan);
        }else{
            $hasil_min_keterampilan = min(array_values(array_diff($arr_keterampilan, $except)));
        }


        // add value ke arry defuzifikasi
        $defuzifikasi = [];
        for ($i=0; $i < 4; $i++) { 
            if ($i == 0) {
                $defuzifikasi[$i] = $hasil_min_motif;
            }elseif($i == 1){
                $defuzifikasi[$i] = $hasil_min_konsep;
            }elseif($i == 2){
                $defuzifikasi[$i] = $hasil_min_pengetahuan;
            }else{
                $defuzifikasi[$i] = $hasil_min_keterampilan;
            }
        }
        
        // check duplicate zero
        $zero_duplicate_defuzifikasi = count(array_diff_assoc($defuzifikasi, array_unique($except)));
        if ($zero_duplicate_defuzifikasi == 3) {
            $defuzifikasi  = min($arr_pengetahuan);
        }else{
            $defuzifikasi = min(array_values(array_diff($defuzifikasi, $except)));
        }
        // $defuzifikasi = min(array_values(array_diff($defuzifikasi, $except)));

        // dump($zero_duplicate_defuzifikasi);
        
        return $defuzifikasi;
    }

    // fuzzy sugeno
    public function FuzzySugeno($nilai_motif, $nilai_konsep, $nilai_pengetahuan, $nilai_keterampilan)
    {
        // hasil nilai motif
        $motif = [];
        for ($i=0; $i < 3; $i++) { 
            if ($i == 0) {
                $motif[$i] = self::U_Low($nilai_motif);
            }elseif($i == 1){
                $motif[$i] = self::U_Middle($nilai_motif);
            }else{
                $motif[$i] = self::U_Hight($nilai_motif);
            }
        }

        // hasil nilai konsep
        $konsep = [];
        for ($i=0; $i < 3; $i++) { 
            if ($i == 0) {
                $konsep[$i] = self::U_Low($nilai_konsep);
            }elseif($i == 1){
                $konsep[$i] = self::U_Middle($nilai_konsep);
            }else{
                $konsep[$i] = self::U_Hight($nilai_konsep);
            }
        }

        // hasil nilai pengetahuan
        $pengetahuan = [];
        for ($i=0; $i < 3; $i++) { 
            if ($i == 0) {
                $pengetahuan[$i] = self::U_Low($nilai_pengetahuan);
            }elseif($i == 1){
                $pengetahuan[$i] = self::U_Middle($nilai_pengetahuan);
            }else{
                $pengetahuan[$i] = self::U_Hight($nilai_pengetahuan);
            }
        }

        // keterampilan
        $keterampilan = [];
        for ($i=0; $i < 3; $i++) { 
            if ($i == 0) {
                $keterampilan[$i] = self::U_Low($nilai_keterampilan);
            }elseif($i == 1){
                $keterampilan[$i] = self::U_Middle($nilai_keterampilan);
            }else{
                $keterampilan[$i] = self::U_Hight($nilai_keterampilan);
            }
        }

        $result_fuzifikasi = self::Defuzifikasi($motif, $konsep, $pengetahuan, $keterampilan);
        return $result_fuzifikasi;
    }

    
}