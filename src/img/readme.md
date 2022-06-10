## IMG PROCESSING Class

### IMAGE OCR - Tesseract

IMG class adalah class khusus untuk optical character recognition, dibangun menggunakan teserract ocr php, tesseract OCR Enggine sendiri merupakan software Open source yang dikembangkan oleh google team dengan bahasa c++ .
reference :

- https://opensource.google/projects/tesseract
- https://github.com/tesseract-ocr/tesseract
- https://github.com/thiagoalessio/tesseract-ocr-for-php

#### Note

disini saya menggunakan windows sebagai OS, jadi saya termasuk windows users, untuk temen temen lain yang ingin menggunakan OCR wajib menginstall capture2text version 3.9 recommend menggunakan chocolately packages for windows. selengkapnya bisa read di sini

_full doc about tesseract ocr for php_

- https://github.com/thiagoalessio/tesseract-ocr-for-php#-note-for-windows-users

_for install choco_

- https://chocolatey.org/install

_install used administrative powershell_

```powershell
choco install capture2text --version 3.9
```

_file test_
untuk file test bisa di check di halaman ini

- [image test](https://github.com/naagaraa/metode-skriphit/tree/main/src/example/image)

#### basic usage

```php

use Nagara\Src\Img\ImgParser;

// create object
$img = new ImgParser;

// put path image file
$img->parseFile("indonesia.jpg"); # default no lang
$img->parseFile("germany.jpg", "deu"); # spesific lang


// print lang support
$img->printLangSupport();

// print about this tool
$img->printAbout();

```

recognition type :
ini akan memakan waktu untuk mengenali text secara random

```php
use Nagara\Src\Img\ImgParser;

$img = new ImgParser("path/to/tesseract"); # example path exe'C:\Program Files\Tesseract-OCR\tesseract.exe'
$img->parseFile("english.jpg", "recognition");

```

language support :

1. deu
2. eng
3. fra
4. ita
5. jpn
6. spa

### Image Magic

untuk mempermudah process image processing gue update class baru dan method untuk tambahan yaitu image magic, untuk dasar PHP kalian harus >= 7.4 dan telah menginstall module imagick php dan pastikan sudah ready GD image. karena syarat adalh itu.

#### MakeThumbnail

```php

use Nagara\Src\Img\ImgMagic;

$image = new ImgMagic;

$path =  "naruto.jpg";
$image->MakeThumbnail($path); // return thumbnail


```

#### Convert Image to PNG, GIF or BMP

```php
use Nagara\Src\Img\ImgMagic;

$image = new ImgMagic;

$path =  "naruto.jpg";
$image->convert($path, "png"); // baut file baru dengan extension png

```

#### Image Filter

filter yang tersedia

- grayscale
- gaussian_blur
- selective_blur
- emboss
- negatif

```php
use Nagara\Src\Img\ImgMagic;

$image = new ImgMagic;

$path =  "naruto.jpg";
$image->filter($path, "grayscale");

```

### Compare two image

coming soon

https://mlocati.github.io/articles/php-windows-imagick.html
https://windows.php.net/downloads/pecl/releases/imagick/
https://www.php.net/manual/en/imagick.requirements.php
https://windows.php.net/downloads/pecl/

# tesseract setup

install capture2text for windows

```
choco install capture2text --version 3.9
```

install tesseract lang

```
choco install tesseract --force `tesseract-lang
```

# Maintenner

this code maintenace by me miyuki nagara

- [miyuki nagara](https://github.com/naagaraa/)
