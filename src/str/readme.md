# STR class

this class for magic string only

## remove non-vowel

this method for remove character non vowel or non vocal

```php

use Nagara\Src\Str\StringMagic;

$str = new StringMagic;
echo $str->vocal("saya"); // return aa

```

## remove vowel

this method for remove character vowel or vocal

```php
use Nagara\Src\Str\StringMagic;

$str = new StringMagic;
echo $str->konsonan("saya"); // return sy
```

## check years is kabisat

this method for check tahun kabisat

```php
use Nagara\Src\Str\StringMagic;

$str = new StringMagic;
$str->isKabisat(2000); // return tahun kabisat
echo "<br>";
$str->isKabisat(2001); // return bukan tahun kabisat
```

## check word palindrom or not

this method for check word has palindrom or no

```php
use Nagara\Src\Str\StringMagic;

$str = new StringMagic;
$str->isPalindrom("kasur"); // return bukan palindrom
echo "<br>";
$str->isPalindrom("katak"); // return palindrom
```

## fibbonaci

this method for print deret fibbonaci

```php

use Nagara\Src\Str\StringMagic;

$str = new StringMagic;
$str->fibbonaci(6);
// return 0 1 1 2 3 5
echo "<br>";
$str->fibbonaci(10);
// return 0 1 1 2 3 5 8 13 21 34

```

## pyramid triangle

this method for print triangle start

```php
use Nagara\Src\Str\StringMagic;

$str = new StringMagic;
$str->triangle(10);

//                   *
//                 *  *
//               *  *  *
//             *  *  *  *
//           *  *  *  *  *
//         *  *  *  *  *  *
//       *  *  *  *  *  *  *
//     *  *  *  *  *  *  *  *
//   *  *  *  *  *  *  *  *  *
// *  *  *  *  *  *  *  *  *  *
```
