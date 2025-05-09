<?php

namespace App\Http\Controllers;
use App\Models\Loan;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateLoanRequest;
use Carbon\Carbon;

class LoanController extends Controller
{
    public readonly Loan $loan;

    public function __construct(){
        $this->loan = new Loan();
    }
    public function index()
    {
        Carbon::setLocale('pt_BR');
        $loans = $this->loan->all();
        return view('loans',['loans' => $loans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('loan_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateLoanRequest $request)
    {
        Loan::create([
            'order' => $request->order,
            'person' => $request->person,
            'date' => $request->date, 
        ]);
    
        return redirect()->back()->with('message', 'Empréstimo registrado, com sucesso');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        return view('loan_edit', ['loan' => $loan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateLoanRequest $request, string $id)
    {
        $updated = $this->loan->where('id', $id)->update($request->except(['_token', '_method']));

       if($updated){
        return redirect()->back()->with('message', 'Editado com sucesso');
       }
       return redirect()->back()->with('message', 'Erro');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->loan->where('id', $id)->delete();

        if($deleted){
            return redirect()->route('loans.index')->with('message', 'Excluído com sucesso!');
        }
    
        return redirect()->route('loans.index')->with('message', 'Erro ao excluir!');
    }
}
