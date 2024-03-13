<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller as BaseController;

abstract class Controller
{
    use AuthorizesRequests, ValidatesRequests;
}
