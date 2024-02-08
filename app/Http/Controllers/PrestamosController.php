<?php

namespace App\Http\Controllers;

use App\Models\Prestamos;
use Illuminate\Http\Request;
use App\Filters\PrestamoFilter;
use App\Http\Requests\StorePrestamoRequest;
use App\Http\Requests\UpdatePrestamoRequest;

class PrestamosController extends Controller
{
    public function index(Request $request)
    {
        $filter = new PrestamoFilter();
        $queryItems = $filter->transform($request);
        $loans = Prestamos::where($queryItems);
        return response()->json($loans->paginate()->appends($request->query()));
    }
    public function store(StorePrestamoRequest $request)
    {
        return Prestamos::create($request->all());
    }
    public function show(Prestamos $loan)
    {
        return response()->json([
            'status' => true,
            'data' => $loan
        ]);
    }
    public function update(UpdatePrestamoRequest $request, Prestamos $loan)
    {
        $loan->update($request->all());
    }
    public function destroy(Prestamos $loan)
    {
        $loan->delete();
        return response()->json([
            'status' => true,
            'message' => 'Loan deleted successfully'
        ]);
    }
}
