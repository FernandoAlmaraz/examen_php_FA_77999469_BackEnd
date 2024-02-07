<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        $books = Libro::paginate();
        return response()->json($books);
    }
    public function store(Request $request)
    {
    }
    public function show(Libro $book)
    {
    }
    public function update(Request $request, Libro $book)
    {
    }
    public function destroy(Libro $book)
    {
    }
}
