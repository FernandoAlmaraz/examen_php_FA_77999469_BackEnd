<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class PrestamoFilter extends ApiFilter
{
    protected $safeParams = [
        'book_id' => ['eq'],
        'client_id' => ['eq'],
        'loan_date' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'loan_days' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'status' => ['eq'],
    ];
    protected $columnMap = [
        'book_id' => 'book_id',
        'client_id' => 'client_id',
        'loan_date' => 'loan_date',
        'loan_days' => 'loan_days',
        'status' => 'status',
    ];
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];
}
