<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class AutorFilter extends ApiFilter
{
    protected $safeParams = [
        'name' => ['eq'],
    ];
    protected $columnMap = [
        'name' => 'name',
    ];
    protected $operatorMap = [
        'eq' => '=',
    ];
}
