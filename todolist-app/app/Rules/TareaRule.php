<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TareaRule implements ValidationRule
{

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
}
