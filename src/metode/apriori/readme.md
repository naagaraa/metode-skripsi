# Apriori

this original code from [ h-collector](https://github.com/h-collector/Apriori) i juts put him code to my library cause i'm to lazy read a journal science and make from 0. you can visit her account for more detail.

# example

```php

use Nagara\Src\Metode\MetodeApriori;

//variables
$minSupp  = 5;                  //minimal support
$minConf  = 75;                 //minimal confidence
$type     = MetodeApriori::SRC_PLAIN; //data type
$recomFor = 'beer';             //recommendation for
$dataFile = 'data.json.gz';     //file for saving of state 

//some example of data source
$data = array();
switch ($type) {
   case MetodeApriori::SRC_PLAIN:
      //transactions
      $data = array(
         'bread, milk',
         'sugar, milk, beer',
         'bread',
         'bread, milk, beer',
         'sugar, milk, beer'
      ); //id(items)  
      //$data = 'plain.txt';
      break;
   case MetodeApriori::SRC_DB:
      //database
      $data = array(
         100 => array(1, 'A'),
         101 => array(1, 'C'),
         102 => array(1, 'D'),
         200 => array(2, 'B'),
         201 => array(2, 'C'),
         202 => array(2, 'E'),
         300 => array(3, 'A'),
         301 => array(3, 'B'),
         302 => array(3, 'C'),
         303 => array(3, 'E'),
         400 => array(4, 'B'),
         401 => array(4, 'E')
      ); //id(user,item)     
      break;
   case MetodeApriori::SRC_CSV:
      $data = array(
         'file' => '../data/transact.csv',
         'tid' => 'transactId',
         'item' => 'itemName',
         'delim' => "\t"
      );
      break;
}

try {
   $apri = new MetodeApriori($type, $data, $minSupp, $minConf);
   $apri->displayTransactions()
      ->solve()
      ->saveState($dataFile);                 //saving of state without rules

   unset($apri);

   $b = new MetodeApriori(MetodeApriori::SRC_LOAD, $dataFile); //laod state and generate rules
   $b->generateRules()
      ->displayRules()
      ->displayRecommendations($recomFor)
      ->saveState($dataFile);                 //save state with rules

   unset($b);

   file_put_contents('unpacked.txt', print_r(MetodeApriori::loadAndPrintStateFile($dataFile, false), true));
} catch (Exception $exc) {
   echo $exc->getMessage();
}

```

## result

```txt
--------------------------------------------------------------------------------
 Tr_id  Items
--------------------------------------------------------------------------------
     0  bread,milk
     1  sugar,milk,beer
     2  bread
     3  bread,milk,beer
     4  sugar,milk,beer
--------------------------------------------------------------------------------
--------------------------------------------------------------------------------
   No.                     Set   Support                        Rule Confidence
--------------------------------------------------------------------------------
     0               beer,milk    60.00%                  beer=>milk   100.00%
     1               beer,milk    60.00%                  milk=>beer    75.00%
     2              beer,sugar    40.00%                 sugar=>beer   100.00%
     3              milk,sugar    40.00%                 sugar=>milk   100.00%
     4         beer,milk,sugar    40.00%            sugar=>beer,milk   100.00%
     5         beer,bread,milk    20.00%            beer,bread=>milk   100.00%
     6         beer,milk,sugar    40.00%            milk,sugar=>beer   100.00%
     7         beer,milk,sugar    40.00%            beer,sugar=>milk   100.00%
--------------------------------------------------------------------------------
--------------------------------------------------------------------------------
   No.   Support  Confidence  Recommendation (5.00%/75.00%) for: beer
--------------------------------------------------------------------------------
     0    60.00%     100.00%  milk
--------------------------------------------------------------------------------
```

