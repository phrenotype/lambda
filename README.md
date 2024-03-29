# Lambda
![github stars](https://img.shields.io/github/stars/phrenotype/lambda?style=social)
![license](https://img.shields.io/github/license/phrenotype/lambda)
![contributors](https://img.shields.io/github/contributors/phrenotype/lambda)
![code size](https://img.shields.io/github/languages/code-size/phrenotype/lambda)


This is a library for converting both named and annonymous php functions into lambda expressions.  This the allows them to be curried and partially applied.

## Install  
`composer require phrenotype/lambda`  

## Examples

#### With all parameters required  

```php
$add = lambda(function($a, $b, $c){
	return $a + $b + $c;
});

echo $add(4,5,2);
echo $add(4,5)(2);
echo $add(4)(5,2);
echo $add(4)(5)(2);
```

#### With optional parameters  
This is a little bit tricky.  

```php
$add = lambda(function($a, $b, $c=2){
	return $a + $b + $c;
});
```

The key thing to remember is that once the numbers of arguments applied ***exactly matches*** the required number of arguments, It will return a result, not a lambda. So, in applying arguments, do not apply them curry style when dealing with optional parameters. Use partial application instead.

```php
echo $add(4,5,2); // Ok
echo $add(4)(5,2) // Ok
echo $add(4,5)(2); // Error
echo $add(4)(5)(2); //Error
```

## Contact  
**Email** : paul.contrib@gmail.com