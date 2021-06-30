<?php
include "connection.php";

/**
 * function fetch assoc mysql
 * @author nagara
 * @return array
 * @param mysql result
 */
function fetch_assoc($mysql_result)
{
    $hasil = [];
    while ($row = mysqli_fetch_assoc($mysql_result)) {
        $hasil[] = $row;
    }
    return $hasil;
}

/**
 * function query for getting database
 * @author nagara
 * @param query
 * @return mysql result
 */
function query($query = "")
{
    global $conn;
    return mysqli_query($conn, $query);
}