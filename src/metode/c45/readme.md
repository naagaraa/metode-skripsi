# c45
this method get from [juliardi](https://github.com/juliardi/C45) fro more detail you can visit him. thx


## example

```php
use C45\C45;

$filename = __DIR__ . '/data.csv';

$c45 = new C45([
   'targetAttribute' => 'play',
   'trainingFile' => $filename,
   'splitCriterion' => C45::SPLIT_GAIN,
]);

$tree = $c45->buildTree();
$treeString = $tree->toString();

// print generated tree
echo '<pre>';
print_r($treeString);
echo '</pre>';

$testingData = [
  'outlook' => 'sunny',
  'windy' => 'false',
  'humidity' => 'high',
];

echo $tree->classify($testingData); // prints 'no'
```