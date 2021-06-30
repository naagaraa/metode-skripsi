<?php


/**
 * function membuat single matrix / membuat array satu dimensi dari columnnya
 * @author eka jaya nagara
 * @param array
 * @return array
 */
function make_field_matrix($data = [], $fieldOrColumn = "")
{
    // membuat single matrix dari colum atau fiels
    $new_nilai = [];
    foreach ($data as $siswa) {
        $new_nilai[] = $siswa[$fieldOrColumn];
    }
    return $new_nilai;
}


/**
 * function membuat matrix atau array multi dimensi baru dari original datanya next langsung buat normalisasi
 * @author eka jaya nagara
 * @param array and integer
 * @return array
 */
function make_new_matrix($data = [], $total_column_matrix ,$field = [] , $cost_column_index)
{
    // check kondisi
    if ($total_column_matrix !== count($field)) {
        echo "jumlah column yang di inputkan tidak sama dengan jumlah nama column yang masukan";
        exit;
    }

    // membuat matrix baru
    $box_matrix = array();
    for ($i = 0; $i < $total_column_matrix ; $i++) { 
        $box_matrix[$i] = make_field_matrix($data, $field[$i]);
    }

    return $box_matrix;
}

/**
 * function membuat matrix atau array multi dimensi baru dari original datanya tampa normalisasi
 * @author eka jaya nagara
 * @param array and integer
 * @return array
 */
function new_matrix($data = [], $total_column_matrix ,$field = [] , $cost_column_index)
{
    // membuat matrix baru
    $box_matrix = array();
    for ($i = 0; $i < $total_column_matrix ; $i++) { 
        $box_matrix[$i] = make_field_matrix($data, $field[$i]);
    }

    // dump($box_matrix);
    $box_matrix_normalisasi = normalisasi_value($box_matrix, $cost_column_index);

    // return $box_matrix;
    return $box_matrix_normalisasi;
}

/**
 * function membuat flip matrix atau melaukan tranfrom array baris menjadi colum atau sebaliknya
 * @author eka jaya nagara
 * @param array and integer
 * @return array
 */
function flip_matrix($array = [])
{
    $hasil = array();
	foreach ($array as $key => $subarr)
	{
		foreach ($subarr as $subkey => $subvalue)
		{
			$hasil[$subkey][$key] = $subvalue;
		}
	}
	return $hasil;
}


