<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class LibroFilter extends ApiFilter
{
    protected $safeParams = [
        'title' => ['eq'],
        'autor_id' => ['eq'],
        'lot' => ['eq'],
        'genre' => ['eq'],
    ];
    protected $columnMap = [
        'title' => 'title',
        'autor_id' => 'autor_id',
        'lot' => 'lot',
        'genre' => 'genre',
    ];
    protected $operatorMap = [
        'eq' => '=',
    ];
}
