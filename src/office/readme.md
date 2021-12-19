### Office Class

Office Class adalah method khusus yang saya buat untuk membaca atau read file excel untuk keperluan testing
seperti testing data jika , saya malas untuk mengambil data langsung dari database, saya bisa mengambil dan
melakukan read pada file excel saja


## List of Menu
- [EXCEL](###DOCUMENT-EXCEL-CLASS)
- [DOCS Parser](###DOCX-PARSER)
- [PDF Parser](###PDF-PARSE)
- [FILE Listing](###File-Manager-Listing)

## DOCUMENT EXCEL CLASS

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

## PDF PARSER

pdf parser is class pdf data extraction by Sebastien MALOT class for file

- _note name document can't have a space_

### basic usage

```php

// init
use Sebastien\Src\Doc\PdfParser;

// create object
$pdf = new PdfParser;

// save data to string
$data = $pdf->parseFile("filename.pdf");
echo $data;
```

## DOCX PARSER

Docx parser is class docx data extraction by answer at stackoverflow

- _note name document can't have a space_

```php
// init
use Nagara\Src\Doc\DocumentDocx;

// create object
$docx = new DocumentDocx;

// save data to string
$data = $docx->parseFile("filename.docx");
echo $data;

```

## File Manager Listing

listing directory

```php

use Nagara\Src\Doc\FileManager;

$file =  new FileManager;

echo "listing files";
dump($file->listing_files("src"));
echo "listing directory";
dump($file->listing_directory("src"));


```

# Maintenner

this code maintenace by me miyuki nagara

- [miyuki nagara](https://github.com/naagaraa/)
