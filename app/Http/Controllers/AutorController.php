<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Filters\AutorFilter;

class AutorController extends Controller
{
    public function index(Request $request)
    {
        $filter = new AutorFilter();
        $queryItems = $filter->transform($request);
        $autors = Autor::where($queryItems);
        return response()->json($autors->paginate()->appends($request->query()));
    }
    public function store(Request $request)
    {
    }
    public function show(Autor $autor)
    {
    }
    public function update(Request $request, Autor $autor)
    {
    }
    public function destroy(Autor $autor)
    {
    }
}
