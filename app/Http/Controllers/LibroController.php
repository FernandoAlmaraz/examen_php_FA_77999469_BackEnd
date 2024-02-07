<?php

namespace App\Http\Controllers;


use App\Models\Libro;
use Illuminate\Http\Request;
use App\Filters\LibroFilter;

class LibroController extends Controller
{
    public function index(Request $request)
    {
        $filter = new LibroFilter();
        $queryItems = $filter->transform($request);
        $books = Libro::where($queryItems);
        return response()->json($books->paginate()->appends($request->query()));
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
