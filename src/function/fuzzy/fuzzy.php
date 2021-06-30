<?php

/**
 * fuzifikasi
 * fuzifikasi untuk penentuan nilai 
 * 
 * 1. tentukan range nilainya 
 *    example 1 - 6 atau 0 - 100, berarti perhatikan selisihnya
 *    a. 1 - 6
 *       selisihnya adalah 1
 *       rendah = 1 - 2
 *       medium = 3 - 4
 *       hight  = 5 - 6
 * 
 *    b. 0 -100
 *       selisihnya 30
 *       rendah = 0 - 30
 *       medium = 40 - 70
 *       hight  = 80 - 100
 * 
 * 
 * 2. rumus pencarian nilai min - max
 *    | ( max - x ) / ( max - min ) |
 * 
 *    keterangan :
 *    x , y, z adalah variabel nilai kurang, cukup, baik
 *    
 *    note : 
 *    jika nikai x >= min x,y,z
 *    maka ( x - min ) / ( max - min )
 * 
 *    jika nilai x <= max nilai x,y,z
 *    maka ( max - x ) / ( max - min )
 *    
 * 
 */

// $kategory = "";

// if($kategory == "kurang"){
//     $nilai = [
//         "min" => 1,
//         "max" => 2,
//     ];
// }elseif($kategory == "cukup") {
//     $nilai = [
//         "min" => 3,
//         "mix" => 4,
//     ];
// }elseif($kategory == "baik") {
//     $nilai = [
//         "min" => 5,
//         "max" => 6,
//     ];
// }else{
//     echo "kategory tidak terdaftar";
// }



/**
 * function jika value inputannya adalah bilangan yang lebih kecil dari nilai maximumnya
 * @return integer
 */
function val_is_low($input  = 0, $min, $max)
{
    global $nilai;
    $value = ( $max - $input ) / ( $max - $min );
    return $value;
}

/**
 * function jika value inputannya adalah bilangan yang lebih besar dari nilai minimumnya
 * @return integer
 */
function val_is_hight($input = 0, $min, $max)
{
    global $nilai;
    $value = ( $input - $max  ) / ( $max - $min );
    return $value;
}

/**
 * untuk rumus perhitungan hasilnya
 * @return integer
 */
function result_output_penilaian($input_user = 0, $min, $max )
{
    global $nilai;

    // $type = $type_penilaian;
    $input = $input_user;
    $hasil = null;

    // check jika nilai inputan untuk menentukan pola rumus yang digunakan
    if($input > $min){
        $hasil =  val_is_hight($input, $min, $max);
    }else{
        $hasil = val_is_low($input, $min, $max);
    }
    return $hasil;
}



// store array kosong
$hasil_akhir = [
    "motif_diri" => [
        "kurang"    => null,
        "cukup"     => null,
        "baik"      => null
    ],
    "pengetahuan" => [
        "kurang"    => null,
        "cukup"     => null,
        "baik"      => null
    ],
    "keterampilan" => [
        "kurang"    => null,
        "cukup"     => null,
        "baik"      => null,
    ],
];


// save dulu ke variabel
// return integer value
$motif_diri = (int) $_POST["motif_diri"];
$pengetahuan = (int) $_POST["pengetahuan"];
$keterampilan= (int) $_POST["keterampilan"];

var_dump($motif_diri, $pengetahuan, $keterampilan);


/**
 * check nilainya untuk menentukan kurang, cukup, baik
 * 
 * buat range - untuk pementuan nilainya : 
 * 
 * kurang = 1 - 2
 * cukup = 3 - 4 
 * baik = 4 - 6
 * 
 * 
 */

// untuk motif diri
// if ( ($motif_diri == 1) or ( $motif_diri == 2) ) 
// {
//     # kodisi kurang 
//     echo "kondisi motif kurang <br>";
//     // $kategory = "kurang";
//     $hasil_akhir["motif_diri"] =  result_output_penilaian($motif_diri, 1 , 2);

// }elseif(($motif_diri == 3 ) or ($motif_diri == 4)) 
// {
//     echo "kondisi motif cukup <br>";
//     // $kategory = "cukup";
//     $hasil_akhir["motif_diri"] =  result_output_penilaian($motif_diri, 3, 4);

// }elseif(($motif_diri == 5 ) or ($motif_diri == 6))
// {
//     echo "kondisi motif baik <br>";
//     // $kategory = "baik";
//     $hasil_akhir["motif_diri"] =  result_output_penilaian($motif_diri, 5, 6);
// }

// // untuk pengetahuan
// if ( ($pengetahuan == 1) or ( $pengetahuan == 2) ) {
//     echo "kondisi pengetahuan kurang <br>";
//     # kodisi kurang 
//     // $kategory = "kurang";
//     $hasil_akhir["pengetahuan"] =  result_output_penilaian($pengetahuan, 1 , 2);
// }elseif(($pengetahuan == 3 ) or ($pengetahuan == 4)) {
//     echo "kondisi pengetahuan cukup <br>";
//     // $kategory = "cukup";
//     $hasil_akhir["pengetahuan"] =  result_output_penilaian($pengetahuan, 3, 4);
// }elseif(($pengetahuan == 5 ) or ($pengetahuan == 6)){
//     echo "kondisi pengetahuan baik <br>";
//     // $kategory = "baik";
//     $hasil_akhir["pengetahuan"] =  result_output_penilaian($pengetahuan, 5, 6);
// }

// // untuk keterampilan
// if ( ($keterampilan == 1) or ( $keterampilan == 2) ) {
//     echo "kondisi keterampilan kurang <br>";
//     # kodisi kurang 
//     // $kategory = "kurang";
//     $hasil_akhir["keterampilan"] =  result_output_penilaian($keterampilan, 1, 2);
// }elseif(($keterampilan == 3 ) or ($keterampilan == 4 )) {
//     echo "kondisi keterangan cukup <br>";
//     // $kategory = "cukup";
//     $hasil_akhir["keterampilan"] =  result_output_penilaian($keterampilan, 3, 4);
// }elseif(($keterampilan == 5 ) or ($keterampilan == 6 )){
//     echo "kondisi keterangan baik <br>";
//     // $kategory = "baik";
//     $hasil_akhir["keterampilan"] =  result_output_penilaian($keterampilan, 5 , 6);
// }


// var_dump(result_output_penilaian($keterampilan, 1, 2));
var_dump($hasil_akhir);


/**
 * // ini untuk motif diri kategory kurang
 * if ( (x <= 1) or (x >= 3))
 * {
 *      // kondisi penilaian kurang rumus 1
 *      $hasil_akhir["motif_diri"]["kurang"] = 0
 * }elseif(1 <= x <= 2) 
 * {
 *      // kondisi penilaian kurang rumus 2
 *      $hasil_akhir["motif_diri"]["kurang"] = result_output_penilaian($motif_diri, 1 , 2)
 * }elseif(3 <= x <= 4)
 * {
 *      // kondisi penilaian kurang rumus 3
 *      $hasil_akhir["motif_diri"]["kurang"] = result_output_penilaian($motif_diri, 3 , 4)
 * }
 * 
 * // ini untuk motif diri katergory cukup
 * if ( (x <= 2) or (x >= 4))
 * {
 *      // kondisi penilaian rumus 1
 *      $hasil_akhir["motif_diri"]["cukup"] = 0
 * }elseif(2 <= x <= 3) 
 * {
 *      // kondisi penilaian rumus 2
 *      $hasil_akhir["motif_diri"]["cukup"] = result_output_penilaian($motif_diri, 2 , 3)
 * }elseif(3 <= x <= 4)
 * {
 *      // kondisi penilaian rumus 3
 *      $hasil_akhir["motif_diri"]["cukup"] = result_output_penilaian($motif_diri, 3 , 4)
 * }
 * 
 * // ini untuk motif diri katergory baik
 * if ( (x <= 3) or (x >= 5))
 * {
 *      // kondisi penilaian rumus 1
 *      $hasil_akhir["motif_diri"]["baik"] = 0
 * }elseif(3 <= x <= 4) 
 * {
 *      // kondisi penilaian rumus 2
 *      $hasil_akhir["motif_diri"]["baik"] = result_output_penilaian($motif_diri, 3 , 4)
 * }elseif(4 <= x <= 5)
 * {
 *      // kondisi penilaian rumus 3
 *      $hasil_akhir["motif_diri"]["baik"] = result_output_penilaian($motif_diri, 4 , 5)
 * }
 * 
 * 
 * 
 */


//  untuk motif diri

if ( ($motif_diri <= 1) and (3 <= $motif_diri ) )
{
    echo "kondisi penilaian motif kurang rumus 1 <br>" ;
    $hasil_akhir["motif_diri"]["kurang"] = 0;
}elseif((1 <= $motif_diri) and ($motif_diri <= 2) or (1 <= $motif_diri) and ($motif_diri <= 2) ) 
{
    echo "kondisi penilaian motif kurang rumus 2 <br>" ;
    $hasil_akhir["motif_diri"]["kurang"] = result_output_penilaian($motif_diri, 1 , 2);
}elseif((3 <= $motif_diri) and ( $motif_diri <= 4) or (3 <= $motif_diri) and ( $motif_diri <= 4))
{
    echo "kondisi penilaian motif kurang rumus 3 <br>" ;
    $hasil_akhir["motif_diri"]["kurang"] = result_output_penilaian($motif_diri, 3 , 4);
}elseif ( ($motif_diri <= 2) or ($motif_diri >= 4) or ($motif_diri <= 2) and ($motif_diri >= 4))
{
    // ini untuk motif diri katergory cukup
    echo "kondisi penilaian motif cukup rumus 1 <br>" ;
    $hasil_akhir["motif_diri"]["cukup"] = 0;
}elseif(((2 <= $motif_diri) <= 3)) 
{
    echo "kondisi penilaian motif cukup rumus 2 <br>";
    $hasil_akhir["motif_diri"]["cukup"] = result_output_penilaian($motif_diri, 2 , 3);
}elseif(((3 <= $motif_diri) <= 4))
{
    echo "kondisi penilaian motif cukup rumus 3 <br>";
    $hasil_akhir["motif_diri"]["cukup"] = result_output_penilaian($motif_diri, 3 , 4);
}elseif ( ($motif_diri <= 3) or ($motif_diri >= 5))
{
    // ini untuk motif diri katergory baik
    echo "kondisi penilaian motif baik rumus 1 <br>" ;
    $hasil_akhir["motif_diri"]["baik"] = 0;
}elseif(((3 <= $motif_diri) <= 4)) 
{
    echo "kondisi penilaian motif baik rumus 2 <br>" ;
    $hasil_akhir["motif_diri"]["baik"] = result_output_penilaian($motif_diri, 3 , 4);
}elseif(((4 <= $motif_diri) <= 5))
{
    echo "kondisi penilaian motif baik rumus 3 <br>" ;
    $hasil_akhir["motif_diri"]["baik"] = result_output_penilaian($motif_diri, 4 , 5);
}


//  untuk pengetahuan
if ( ($pengetahuan <= 1) or ($pengetahuan >= 3))
{
    echo "kondisi penilaian pengetahuan kurang rumus 1 <br>" ;
    $hasil_akhir["pengetahuan"]["kurang"] = 0;
}elseif((1 <= $pengetahuan) <= 2) 
{
    echo "kondisi penilaian pengetahuan kurang rumus 2 <br>" ;
    $hasil_akhir["pengetahuan"]["kurang"] = result_output_penilaian($pengetahuan, 1 , 2);
}elseif((3 <= $pengetahuan) <= 4)
{
    echo "kondisi penilaian pengetahuan kurang rumus 3 <br>" ;
    $hasil_akhir["pengetahuan"]["kurang"] = result_output_penilaian($pengetahuan, 3 , 4);
}elseif ( ($pengetahuan <= 2) or ($pengetahuan >= 4))
{
    // ini untuk motif diri katergory cukup
    echo "kondisi penilaian pengetahuan cukup rumus 1 <br>" ;
    $hasil_akhir["pengetahuan"]["cukup"] = 0;
}elseif((2 <= $pengetahuan) <= 3) 
{
    echo "kondisi penilaian pengetahuan cukup rumus 2 <br>" ;
    $hasil_akhir["pengetahuan"]["cukup"] = result_output_penilaian($pengetahuan, 2 , 3);
}elseif((3 <= $pengetahuan) <= 4)
{
    echo "kondisi penilaian pengetahuan cukup rumus 3 <br>" ;
    $hasil_akhir["pengetahuan"]["cukup"] = result_output_penilaian($pengetahuan, 3 , 4);
}
elseif ( ($pengetahuan <= 3) or ($pengetahuan >= 5))
{
    // ini untuk motif diri katergory baik
    echo "kondisi penilaian pengetahuan baik rumus 1 <br>" ;
    $hasil_akhir["pengetahuan"]["baik"] = 0;
}elseif((3 <= $pengetahuan) <= 4) 
{
    echo "kondisi penilaian pengetahuan baik rumus 2 <br>" ;
    $hasil_akhir["pengetahuan"]["baik"] = result_output_penilaian($pengetahuan, 3 , 4);
}elseif((4 <= $pengetahuan) <= 5)
{
    echo "kondisi penilaian pengetahuan baik rumus 3 <br>";
    $hasil_akhir["pengetahuan"]["baik"] = result_output_penilaian($pengetahuan, 4 , 5);
}


//  echo untuk keterampilan
if ( ($keterampilan <= 1) or ($keterampilan >= 3))
{
    echo "kondisi penilaian keterampilan kurang rumus 1 <br>";
    $hasil_akhir["keterampilan"]["kurang"] = 0;
}elseif((1 <= $keterampilan) <= 2) 
{
    echo "kondisi penilaian keterampilan kurang rumus 2 <br>";
    $hasil_akhir["keterampilan"]["kurang"] = result_output_penilaian($keterampilan, 1 , 2);
}elseif((3 <= $keterampilan) <= 4)
{
    echo "kondisi penilaian keterampilan kurang rumus 3 <br>";
    $hasil_akhir["keterampilan"]["kurang"] = result_output_penilaian($keterampilan, 3 , 4);
}elseif ( ($keterampilan <= 2) or ($keterampilan >= 4))
{
    // ini untuk motif diri katergory cukup
    echo "kondisi penilaian keterampilan cukup rumus 1 <br>";
    $hasil_akhir["keterampilan"]["cukup"] = 0;
}elseif((2 <= $keterampilan) <= 3) 
{
    echo "kondisi penilaian keterampilan cukup rumus 2 <br>";
    $hasil_akhir["keterampilan"]["cukup"] = result_output_penilaian($keterampilan, 2 , 3);
}elseif((3 <= $keterampilan) <= 4)
{
    echo "kondisi penilaian keterampilan cukup rumus 3 <br>";
    $hasil_akhir["keterampilan"]["cukup"] = result_output_penilaian($keterampilan, 3 , 4);
}elseif ( ($keterampilan <= 3) or ($keterampilan >= 5))
{
// ini untuk motif diri katergory baik
    echo "kondisi penilaian keterampilan baik rumus 1 <br>";
    $hasil_akhir["keterampilan"]["baik"] = 0;
}elseif((3 <= $keterampilan) <= 4) 
{
    echo "kondisi penilaian keterampilan baik rumus 2 <br>";
}elseif((4 <= $keterampilan) <= 5)
{
    echo "kondisi penilaian keterampilan baik rumus 3 <br>";
    $hasil_akhir["keterampilan"]["baik"] = result_output_penilaian($keterampilan, 4 , 5);
}