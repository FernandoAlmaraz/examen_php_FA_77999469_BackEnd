<?php

namespace App\Http\Controllers;

use App\Models\Prestamos;
use Illuminate\Http\Request;

class PrestamosController extends Controller
{
    public function index()
    {
        $loans = Prestamos::paginate();
        return response()->json($loans);
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
