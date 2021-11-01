<?php

namespace lambda;

class Lambda
{

    private $function;
    private $appliedArguments = [];
    private $parameterCount;
    private $requiredParameterCount;

    public function __construct(callable $function)
    {
        $this->function = $function;
        $rf = new \ReflectionFunction($function);
        $this->parameterCount = $rf->getNumberOfParameters();
        $this->requiredParameterCount = $rf->getNumberOfRequiredParameters();
    }

    public function __invoke(...$args)
    {
        $this->appliedArguments = array_merge($this->appliedArguments, $args);
        $count = count($this->appliedArguments);
        if ($count < $this->requiredParameterCount) {
            return $this;
        } else {
            
            if ($count === $this->requiredParameterCount) {
                return call_user_func_array($this->function, $this->appliedArguments);
            } else if ($count > $this->requiredParameterCount) {

                if ($count >= $this->parameterCount) {
                    $args = array_slice($this->appliedArguments, 0, $this->parameterCount);
                    return call_user_func_array($this->function, $args);
                } else {
                    $this;
                }
            }
        }
    }
}


function lambda(callable $function)
{
    return new Lambda($function);
}

