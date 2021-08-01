### Office Class

Office Class adalah method khusus yang saya buat untuk membaca atau read file excel untuk keperluan testing 
seperti testing data jika , saya malas untuk mengambil data langsung dari database, saya bisa mengambil dan 
melakukan read pada file excel saja


### format file excel atau CSV

- nama column berada pada ROW 1 [A1,B1,C1,D1 ... E - n]
- data yang berupa value atau dimulai dari ROW 2

atau untuk contoh nyata bentuk file csv example bisa check [disini]() ini adalah file example yang diambil dari kaggle untuk public data penelitian data science atau research of data science <b>jakarta.csv<b> untuk file example pada libraries saya


### method available
```php
$excel = new DocumentExcel;
$excel->read("filename.csv");
$excel->execute();

// show
$excel->showColumn();
$excel->showRow();
$excel->showByColumn("column-name");

```


### basic usage
```php

use Nagara\Src\Doc\DocumentExcel; //load libraries

// init or read file
$excel = new DocumentExcel;
$jakarta = $excel->read("jakarta.csv"); // read file excel
$excel->execute();


// show by column
$column = $excel->showColumn();
$row = $excel->showRow();
$bycolumn = $excel->showByColumn("hospitalized"); //insert column name


// debug field array
dump($column);
dump($row);
dump($bycolumn);

```