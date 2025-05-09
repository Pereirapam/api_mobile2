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

        return view('demands', compact('demands'));

    }

    public function create()
    {
        $marks = Mark::all();

        return view('demand_create', compact('marks'));
    }


    public function store(StoreUpdateDemandRequest $demands)
    {
        Demand::create([
            'type' => $demands->type,
            'arrival_date' => $demands->arrival_date,
            'cycle' => $demands->cycle,
            'mark_id' =>$demands->mark_id

        ]);

        return redirect()->back()->with('message', 'Pedido cadastrado com sucesso');

    }

    public function show(string $id)
    {
        //
    }


    public function edit(Demand $demand)
    {
        $marks = Mark::all();
        return view('demand_edit', compact('marks', 'demand'));
    }


    public function update(StoreUpdateDemandRequest $request, string $id)
    {
        $updated = $this->demand->where('id', $id)->update($request->except(['_token', '_method']));
        if ($updated) {
            return redirect()->back()->with('message', 'Editado com sucesso');
        }
        return redirect()->back()->with('message', 'Erro');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->demand->where('id', $id)->delete();

        if($deleted){
            return redirect()->route('demands.index')->with('message', 'Excluído com sucesso!');
        }
    
        return redirect()->route('demands.index')->with('message', 'Erro ao excluir!');
    }
}
