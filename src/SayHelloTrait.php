<?php

namespace SayHelloPackage;

trait SayHelloTrait
{
    public function greet($name)
    {
        return "Hallo, " . $name . "!";
    }
}
