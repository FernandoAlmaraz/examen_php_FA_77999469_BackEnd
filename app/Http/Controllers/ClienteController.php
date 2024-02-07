<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Filters\ClienteFilter;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $filter = new ClienteFilter();
        $queryItems = $filter->transform($request);
        $clients = Cliente::where($queryItems);
        return response()->json($clients->paginate()->appends($request->query()));
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
