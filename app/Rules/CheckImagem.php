<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckImagem implements Rule
{
    public $imagem;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($imagem)
    {
        $this->imagem = $imagem;
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
        if ($this->imagem)
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
