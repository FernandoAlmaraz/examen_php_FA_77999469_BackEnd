<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Filters\ClienteFilter;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Http\Resources\ClienteCollection;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $filter = new ClienteFilter();
        $queryItems = $filter->transform($request);
        $clients = Cliente::where($queryItems);
        return new ClienteCollection($clients->paginate()->appends($request->query()));
    }
    public function store(StoreClienteRequest $request)
    {
        return Cliente::create($request->all());
    }
    public function show(Cliente $client)
    {
        return response()->json([
            'status' => true,
            'data' => $client
        ]);
    }
    public function update(UpdateClienteRequest $request, Cliente $client)
    {
        $client->update($request->all());
    }
    public function destroy(Cliente $client)
    {
        $client->delete();
        return response()->json([
            'status' => true,
            'message' => 'Client deleted successfully'
        ]);
    }
}
