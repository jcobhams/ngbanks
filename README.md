## NgBanks
PHP implementation of [ng-banks](https://github.com/BolajiOlajide/ng-banks).

###Installation
Available for installation on packagist using composer.
```
composer require jcobhams/ngbanks
```

### Usage
After installation and and `require`ing `vendor/autoload.php` file in your project,

```php
use jcobhams\NgBanks\NgBanks;
.
.
.
$this->ngbanks = new NgBanks();

//Get All Banks
$this->ngbanks->getBanks();

//Get Access Bank
$this->ngbanks->getBank('044');

//Add New Bank
$this->ngbanks->addBank('Cobhams Savings and Loans', '007', 'CSL', '*007#')

```

The package contains 3 methods:

* `getBanks()`: this method is used to retrieve all the banks in the system.

* `getBank(param)`: this method is used to retrieve a particular bank based on the parameter supplied. The parameter can either the be the slug of the bank or the bank code. For slugs or code that don't exist, this method returns None.

* `addBank($name, $code, $slug, $ussd_code)`: this method will extend the current list of banks on the fly. Returns a array with the new bank just added or `throws exception` if bank `code` or `slug` already exists.


### CONTRIBUTORS

This package is authored by Joseph Cobhams.