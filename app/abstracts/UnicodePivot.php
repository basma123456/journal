<?php


namespace App\Abstracts;


use Illuminate\Database\Eloquent\Relations\Pivot;
abstract class UnicodePivot extends Pivot
{
    protected function asJson($value)
    {
        return json_encode($value,JSON_UNESCAPED_UNICODE);
    }
}
