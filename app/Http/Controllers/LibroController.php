<?php

namespace App\Http\Controllers;


use App\Models\Libro;
use Illuminate\Http\Request;
use App\Filters\LibroFilter;
use App\Http\Requests\StoreLibroRequest;
use App\Http\Requests\UpdateLibroRequest;

class LibroController extends Controller
{
    public function index(Request $request)
    {
        $filter = new LibroFilter();
        $queryItems = $filter->transform($request);
        $books = Libro::where($queryItems);
        return response()->json($books->paginate()->appends($request->query()));
    }
    public function store(StoreLibroRequest $request)
    {
        return Libro::create($request->all());
    }
    public function show(Libro $book)
    {
    }
    public function update(UpdateLibroRequest $request, Libro $book)
    {
        $book->update($request->all());
    }
    public function destroy(Libro $book)
    {
        $book->delete();
        return response()->json([
            'status' => true,
            'message' => 'Book deleted successfully'
        ]);
    }
}
