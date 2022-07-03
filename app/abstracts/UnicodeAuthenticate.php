<?php


namespace App\Abstracts;


use Illuminate\Foundation\Auth\User as Authenticatable;

abstract class UnicodeAuthenticate extends Authenticatable
{
    protected function asJson($value)
    {
        return json_encode($value,JSON_UNESCAPED_UNICODE);
    }
}
