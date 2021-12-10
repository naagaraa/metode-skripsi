## Time Track

from https://github.com/leo-lobster/php-timetrack

### Instantiate an object

```php
use Nagara\Src\TimeTracker;

$timer = new TimeTracker("start"); // Example Description
```

### Add more timepoints if necessary

```php
// Some Code
$timer->add("All Includes Loaded");

// Some Code
$timer->add("DB Query finished");

// Some Code
$timer->add("Echoing Body");
```

### Show the Results

The HTML Output:

> ```php
> $timer->htmlOut();
> ```

The Text Output:

> ```php
> $timer->logPeriods();
> ```

The Text Output of raw Timestamps:

> ```php
> $timer->logTimestamps();
> ```

The Text Output of String Excecution Time:

> ```php
> $timer->calculate();
> ```

# Maintenner

this code maintenace by me miyuki nagara

- [miyuki nagara](https://github.com/naagaraa/)
