<?php

namespace Base;
use Http\Forms\User;

class ValidationException extends \Exception
{
    public readonly array $erros;
    public readonly array $old;

    public static function throw($erros, $old)
    {
        $object = new static();
        $object->erros = $erros;
        $object->old = $old;
        throw $object;
    }
}
