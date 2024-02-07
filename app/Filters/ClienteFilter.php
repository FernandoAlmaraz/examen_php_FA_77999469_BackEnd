<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class ClienteFilter extends ApiFilter
{
    protected $safeParams = [
        'name' => ['eq'],
        'email' => ['eq'],
        'cellphone' => ['eq'],
        'id_card' => ['eq', 'lt', 'lte', 'gt', 'gte'],
    ];
    protected $columnMap = [
        'name' => 'name',
        'email' => 'email',
        'cellphone' => 'cellphone',
        'id_card' => 'id_card',
    ];
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];
}
