<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateDemandRequest;
use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Demand;
use Carbon\Carbon;

class DemandController extends Controller
{
    public readonly Demand $demand;

    public function __construct(Demand $demand)
    {
        $this->demand = new Demand();
    }

    public function index()
    {
        Carbon::setLocale('pt_BR');

        $demands = Demand::with('mark')->get();

        return response()->json($demands);
    }

    public function store(StoreUpdateDemandRequest $request)
    {
        $created = Demand::create([
            'type' => $request->type,
            'arrival_date' => $request->arrival_date,
            'cycle' => $request->cycle,
            'mark_id' => $request->mark_id,
        ]);

        if ($created) {
            return response()->json($created, 201);
        }

        return response()->json(['message' => 'Erro ao criar pedido'], 500);
    }

    public function show(string $id)
    {
        $demand = Demand::with('mark')->find($id);

        if (!$demand) {
            return response()->json(['message' => 'Pedido não encontrado'], 404);
        }

        return response()->json($demand);
    }

    public function update(StoreUpdateDemandRequest $request, string $id)
    {
        $demand = $this->demand->find($id);

        if (!$demand) {
            return response()->json(['message' => 'Pedido não encontrado'], 404);
        }

        $demand->update($request->only(['type', 'arrival_date', 'cycle', 'mark_id']));

        return response()->json($demand);
    }

    public function destroy(string $id)
    {
        $demand = $this->demand->find($id);

        if (!$demand) {
            return response()->json(['message' => 'Pedido não encontrado'], 404);
        }

        $demand->delete();

        return response()->json(['message' => 'Pedido excluído com sucesso']);
    }
}
