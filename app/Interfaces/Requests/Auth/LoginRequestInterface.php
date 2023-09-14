<?php

namespace App\Interfaces\Requests\Auth;

/**
 * @method array validated($key = null, $default = null)
 */
interface LoginRequestInterface
{
    public function authorize(): bool;
    public function rules(): array;
}
