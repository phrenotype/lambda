# Lambda

This is a libray for converting both named and annonymous php functions into lambda expressions.  
As such it can be curried and partially applied.

## Install  
`composer require lambda/lambda`  

## Examples

#### With all parameters required  

	$add = lambda(function($a, $b, $c){
		return $a + $b + $c;
	});
	
	echo $add(4,5,2);
	echo $add(4,5)(2);
	echo $add(4)(5,2);
	echo $add(4)(5)(2);

#### With optional parameters  
This is a little bit tricky.  

	$add = lambda(function($a, $b, $c=2){
		return $a + $b + $c;
	});

The key thing to remember is that once the numbers of arguments applied ***exactly matches*** the required number of arguments, It will return a result, not a lambda. So, in applying arguments, do not apply them curry style when dealing with optional parameters. Use partial application instead.

	echo $add(4,5,2); // Ok
	echo $add(4)(5,2) // Ok
	echo $add(4,5)(2); // Error
	echo $add(4)(5)(2); //Error
