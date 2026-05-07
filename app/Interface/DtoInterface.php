<?php

namespace App\Interface;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

interface DtoInterface
{
    public static function formApiRequest(FormRequest $formRequest): self;

    public static function  fromModel(Model $model): self;

    public static function toArray(Model $model): array;
}
