<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckNome implements Rule
{
    public $nome;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($nome)
    {
        $this->nome = $nome;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->nome)
            return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
