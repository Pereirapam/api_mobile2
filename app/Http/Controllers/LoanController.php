<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateLoanRequest;

class LoanController extends Controller
{
    public readonly Loan $loan;

    public function __construct(){
        $this->loan = new Loan();
    }

    public function index()
    {
        $loans = $this->loan->all();
        return response()->json($loans);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateLoanRequest $request)
    {
        $created = $this->loan->create([
            'order' => $request->order,
            'person' => $request->person,
            'date' => $request->date,
        ]);

        if ($created) {
            return response()->json($created, 201);
        }

        return response()->json(['message' => 'Erro ao registrar empréstimo!'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $loan = $this->loan->find($id);

        if (!$loan) {
            return response()->json(['message' => 'Empréstimo não encontrado'], 404);
        }

        return response()->json($loan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateLoanRequest $request, string $id)
    {
        $loan = $this->loan->find($id);

        if (!$loan) {
            return response()->json(['message' => 'Empréstimo não encontrado'], 404);
        }

        $loan->update($request->only(['order', 'person', 'date']));

        return response()->json($loan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $loan = $this->loan->find($id);

        if (!$loan) {
            return response()->json(['message' => 'Empréstimo não encontrado'], 404);
        }

        $loan->delete();

        return response()->json(['message' => 'Empréstimo excluído com sucesso']);
    }
}
