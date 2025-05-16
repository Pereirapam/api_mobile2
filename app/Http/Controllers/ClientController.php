<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    public readonly Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function index()
    {
        $clients = Client::all();
        return response()->json($clients);
    }

    public function store(StoreUpdateClientRequest $request)
    {
        $created = Client::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'cpf' => $request->cpf,
        ]);

        if ($created) {
            return response()->json($created, 201);
        }

        return response()->json(['message' => 'Erro ao cadastrar cliente'], 500);
    }

    public function show(string $id)
    {
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }

        return response()->json($client);
    }

    public function update(StoreUpdateClientRequest $request, string $id)
    {
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }

        $client->update($request->only(['name', 'phone', 'cpf']));

        return response()->json($client);
    }

    public function destroy(string $id)
    {
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }

        $client->delete();

        return response()->json(['message' => 'Cliente excluído com sucesso']);
    }
}
