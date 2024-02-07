<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AutorController extends Controller
{
    public function index()
    {
        $autors = Autor::paginate();
        return response()->json($autors);
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
