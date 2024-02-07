<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clients = Cliente::paginate();
        return response()->json($clients);
    }
    public function store(Request $request)
    {
    }
    public function show(Cliente $client)
    {
    }
    public function update(Request $request, Cliente $client)
    {
    }
    public function destroy(Cliente $cliente)
    {
    }
}
