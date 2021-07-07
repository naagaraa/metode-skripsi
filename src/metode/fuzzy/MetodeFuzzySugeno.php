<?php
/**
 * @author      Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa metode skripsi Fuzzy sugeno
 * @license     MIT public license
 */
namespace Nagara\Src\Metode;

class MetodeFuzzySugeno {


    /**
     * hasil defuzifikasi untuk menentukan kompeten atau tidak [1 - 0]
     * @var int             | 1 => kompeten and 0 => not kompeten
     */
    private $defuzifikasi;


    // int hasil perhitungan bentuk array untuk penilaian column 1 - 3 ["konsep", "pengetahuan", "keterampilan"]
    /**
     * result value hasil perhitungan konsep menggunakan kurva segitiga
     * @var array                   | int array konsep
     */
    private $column_1;

    /**
     * result value hasil perhitungan pengetahuan menggunakan kurva segitiga
     * @var array                   | int array pengetahuan
     */
    private $column_2;

    /**
     * result value hasil perhitungan keterampilan menggunakan kurva segitiga
     * @var array                   | int array keterampilan
     */
    private $column_3;




    // int value awal dari user value 1 - 2  ["konsep", "pengetahuan", "keterampilan"]
    /**
     * input value dari user value 1 untuk konsep
     * @var int                 | 
     */
    private $value_1;

    /**
     * input value dari user value 2 untuk pengetahuan
     * @var int                  | int
     */
    private $value_2;

    /**
     * input value dari user value 3 untuk keterampilan
     * @var int
     */
    private $value_3;



    /**
     * method untuk check model kurva segitga atau bahu
     * @author eka jaya nagara
     * @param string                | type kurva ["segitiga", "bahu"]
     * @param string                | arah representasi ["kanan", "kiri"]
     * @param int                   | nilai a
     * @param int                   | nilai b
     * @param int                   | nilai c
     * @param int                   | nilai x
     * @return int                  | hasil perhitungan kurva
     */
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

    /**
     * method untuk perhitungan kurva model bahu
     * @author eka jaya nagara
     * @param string                | arah representasi ["kanan", "kiri"]
     * @param int                   | nilai a
     * @param int                   | nilai b
     * @param int                   | nilai c
     * @param int                   | nilai x
     * @return int                  | hasil perhitungan kurva bahu
     */
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
                     // handling divide by zero
                     if ( $h1/$h2 == 0.0 ) {
                        echo 'Divisor adalah 0';
                    }else{
                        $ux = $h1/$h2;
                    }
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

                    // handling divide by zero
                    if ( $h1/$h2 == 0.0 ) {
                        echo 'Divisor adalah 0';
                    }else{
                        $ux = $h1/$h2;
                    }

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

    /**
     * method untuk perhitungan kurva model segitiga
     * @author eka jaya nagara
     * @param string                | arah representasi ["kanan", "kiri"]
     * @param int                   | nilai a
     * @param int                   | nilai b
     * @param int                   | nilai c
     * @param int                   | nilai x
     * @return int                  | hasil perhitungan kurva segitiga
     */
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

                     // handling divide by zero
                     if ( $h1/$h2 == 0.0 ) {
                        echo 'Divisor adalah 0';
                    }else{
                        $ux = $h1/$h2;
                    }

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

                    // handling divide by zero
                    if ( $h1/$h2 == 0.0 ) {
                        echo 'Divisor adalah 0';
                    }else{
                        $ux = $h1/$h2;
                    }

                }elseif(($a >= $x) and ($x <= $b)){
                    echo "kurva segitiga kanan kondisi 3<br>";
                    $h1 = $b - $x;
                    $h2 = $a - $b;
                     // handling divide by zero
                     if ( $h1/$h2 == 0.0 ) {
                        echo 'Divisor adalah 0';
                    }else{
                        $ux = $h1/$h2;
                    }
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

    /**
     * method untuk fuzzy sugeno type low atau kurang
     * @author eka jaya nagara
     * @param int                   | value x input user ["konsep", "pengetahuan", "keterampilan"]
     * @return int                  | hasil perhitungan kurva untuk type low
     */
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
             // handling divide by zero
            if ( $h2 == 0.0 ) {
                echo 'Cannot divide by zero method U low';
                exit;
            }else{
                $ux = $h1/$h2;
            }
        }elseif((3 <= $x) and ($x <= 4)){
            // echo "kurva segitiga low kondisi 3<br>";
            $h1 = 3 - $x;
            $h2 = 3 - 2;
            // handling divide by zero
            if ( $h2 == 0.0 ) {
                echo 'Cannot divide by zero method U low';
                exit;
            }else{
                $ux = $h1/$h2;
            }
        }else{
            $ux = "angka tidak ada yg memenuhi syarat kondisi";
        }
        return $ux;
    }

    /**
     * method untuk fuzzy sugeno type middle atau cukup
     * @author eka jaya nagara
     * @param int                   | value x input user ["konsep", "pengetahuan", "keterampilan"]
     * @return int                  | hasil perhitungan kurva untuk type middle
     */
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
             // handling divide by zero
            if ( $h2 == 0.0 ) {
                echo 'Cannot divide by zero method U Middle';
                exit;
            }else{
                $ux = $h1/$h2;
            }
        }elseif((3 <= $x) and ($x <= 4)){
            // echo "kurva segitiga middle kondisi 3<br>";
            $h1 = 4 - $x;
            $h2 = 4 - 3;
             // handling divide by zero
            if ( $h2 == 0.0 ) {
                echo 'Cannot divide by zero method U Middle';
                exit;
            }else{
                $ux = $h1/$h2;
            }
        }else{
            $ux = "angka tidak ada yg memenuhi syarat kondisi";
        }
        return $ux;
    }

    /**
     * method untuk fuzzy sugeno type hight atau baik
     * @author eka jaya nagara
     * @param int                   | value x input user ["konsep", "pengetahuan", "keterampilan"]
     * @return int                  | hasil perhitungan kurva untuk type hight
     */
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
            if ( $h2 == 0.0 ) {
                echo 'Cannot divide by zero method U hight';
                exit;
            }else{
                $ux = $h1/$h2;
            }
        }elseif((4 <= $x) and ($x <= 5)){
            // echo "kurva segitiga hight kondisi 3<br>";
            $h1 = 5 - $x;
            $h2 = 5 - 4;
             // handling divide by zero
            if ( $h2 == 0.0 ) {
                echo 'Cannot divide by zero method U hight';
                exit;
            }else{
                $ux = $h1/$h2;
            }
        }else{
            $ux = "angka tidak ada yg memenuhi syarat kondisi";
        }

        return $ux;
    }

    /**
     * method untuk fuzzy sugeno perhitungan defuzifikasi, defuzzifikasi mengambil nilai phi predikat min selain nol atau zero 
     * jika jumlah nol pada hipunan < 3
     * @author eka jaya nagara
     * @param array                   | nilai penilaian konsep  atau konsep 1 
     * @param array                   | nilai penilaian pengetahuan  atau konsep 2 
     * @param array                   | nilai penilaian keterampilan  atau konsep 3 
     * @return int                    | 1 or 0
     */
    public function Defuzifikasi($arr_konsep = [], $arr_pengetahuan = [], $arr_keterampilan = [])
    {
        // Metode Bisektor.
        // get value kecuali 0
        $except = array(0);
        
        // hitung jumlah duplicate 0
        // $zero_duplicate_motif = count(array_diff_assoc($arr_motif, array_unique($except)));
        $zero_duplicate_konsep = array_count_values($arr_konsep);
        $zero_duplicate_pengetahuan = array_count_values($arr_pengetahuan);
        $zero_duplicate_keterampilan = array_count_values($arr_keterampilan);

        // diviade by zero handling
        if (!empty($zero_duplicate_konsep[0])) {
            // check duplicate zero value pada setiap kurva penilaian yg dikirin jumlah 0 === 3
            if ($zero_duplicate_konsep[0] == 3) {
                $hasil_min_konsep = min($arr_konsep);
            }else{
                $hasil_min_konsep = min(array_values(array_diff($arr_konsep, $except)));
            }
        }

        if (!empty($zero_duplicate_pengetahuan[0])) {
            // check duplicate zero value pada setiap kurva penilaian yg dikirin jumlah 0 === 3
            if ($zero_duplicate_pengetahuan[0] == 3) {
                $hasil_min_pengetahuan = min($arr_pengetahuan);
            }else{
                $hasil_min_pengetahuan = min(array_values(array_diff($arr_pengetahuan, $except)));
            }
        }

        if (!empty($zero_duplicate_keterampilan[0])) {
            // check duplicate zero value pada setiap kurva penilaian yg dikirin jumlah 0 === 3
            if ($zero_duplicate_keterampilan[0] == 3) {
                $hasil_min_keterampilan = min($arr_keterampilan);
            }else{
                $hasil_min_keterampilan = min(array_values(array_diff($arr_keterampilan, $except)));
            }
        }

        // add value ke arry defuzifikasi
        $defuzifikasi = [];
        for ($i=0; $i < 3; $i++) { 
            if ($i == 0) {
                $defuzifikasi[$i] = $hasil_min_konsep;
            }elseif($i == 1){
                $defuzifikasi[$i] = $hasil_min_pengetahuan;
            }elseif($i == 2){
                $defuzifikasi[$i] = $hasil_min_keterampilan;
            }
        }
        
        // check duplicate zero
        $zero_duplicate_defuzifikasi = array_count_values($defuzifikasi);
        if (!empty($zero_duplicate_defuzifikasi[0])) {
            // check duplicate zero value pada setiap kurva penilaian yg dikirim jumlah 0 == 3
            if ($zero_duplicate_defuzifikasi[0] == 3) {
                $defuzifikasi  = min($defuzifikasi);
            }else{
                $defuzifikasi = min(array_values(array_diff($defuzifikasi, $except)));
            }
        }
        return $defuzifikasi;
    }

    /**
     * method untuk fuzzy sugeno 
     * @author eka jaya nagara
     * @param int                   | value x input user ["konsep"]
     * @param int                   | value x input user ["pengetahuan"]
     * @param int                   | value x input user ["keterampilan"]
     * @return int                  | 1 or 0
     */
    public function FuzzySugeno($nilai_konsep = 1, $nilai_pengetahuan = 1, $nilai_keterampilan = 1)
    {
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

        $result_fuzifikasi = self::Defuzifikasi($konsep, $pengetahuan, $keterampilan);
        return $result_fuzifikasi;
    }    
}