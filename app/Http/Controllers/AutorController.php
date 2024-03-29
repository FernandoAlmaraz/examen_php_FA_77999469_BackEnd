<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAutorRequest;
use App\Http\Requests\UpdateAutorRequest;
use App\Filters\AutorFilter;
use App\Http\Resources\AutorCollection;

class AutorController extends Controller
{
    public function index(Request $request)
    {
        $filter = new AutorFilter();
        $queryItems = $filter->transform($request);
        $autors = Autor::where($queryItems);
        return new AutorCollection($autors->paginate()->appends($request->query()));
    }
    public function store(Request $request)
    {
        return Autor::create($request->all());
    }
    public function show(Autor $autor)
    {
        return response()->json([
            'status' => true,
            'data' => $autor
        ]);
    }
    public function update(UpdateAutorRequest $request, Autor $autor)
    {
        $autor->update($request->all());
    }
    public function destroy(Autor $autor)
    {
        $autor->delete();
        return response()->json([
            'status' => true,
            'message' => 'Autor deleted successfully'
        ]);
    }
}
