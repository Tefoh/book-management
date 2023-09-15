<?php

namespace App\Http\Views;


use Illuminate\Contracts\View\View as ViewContract;

interface ViewInterface
{
    public function render($data): ViewContract;
}
