<?php

namespace App\Http\Controllers;

use App\Models\Prestamos;
use Illuminate\Http\Request;
use App\Filters\PrestamoFilter;

class PrestamosController extends Controller
{
    public function index(Request $request)
    {
        $filter = new PrestamoFilter();
        $queryItems = $filter->transform($request);
        $loans = Prestamos::paginate($queryItems);
        return response()->json($loans->paginate()->appends($request->query()));
    }
    public function store(Request $request)
    {
    }
    public function show(Prestamos $loan)
    {
    }
    public function update(Request $request, Prestamos $loan)
    {
    }
    public function destroy(Prestamos $loan)
    {
    }
}
