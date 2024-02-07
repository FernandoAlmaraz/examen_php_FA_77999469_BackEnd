<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class PrestamoFilter extends ApiFilter
{
    protected $safeParams = [
        'bkid' => ['eq'],
        'clid' => ['eq'],
        'ldate' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'ldays' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'status' => ['eq'],
    ];
    protected $columnMap = [
        'bkid' => 'book_id',
        'clid' => 'client_id',
        'ldate' => 'loan_date',
        'ldays' => 'loan_days',
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
