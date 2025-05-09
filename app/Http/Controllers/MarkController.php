<?php

namespace App\Http\Controllers;
use App\Models\Mark;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateMarkRequest;


class MarkController extends Controller
{
    public readonly Mark $mark;

    public function __construct(){
        $this->mark = new Mark();
    }


    public function index()
    {
        $marks = $this->mark->all();
        return view('marks',['marks' => $marks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mark_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateMarkRequest $request)
    {
      $created = $this->mark->create([
            'mark' => $request -> input('mark')
      ]);

      if($created){
        return redirect()->back()->with('message', 'Marca cadastrado com sucesso');
       }
       return redirect()->back()->with('message', 'Erro');

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
    public function edit(Mark $mark)
    {
        return view('mark_edit', ['mark' => $mark]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateMarkRequest $request, string $id)
    {
       $updated = $this->mark->where('id', $id)->update($request->except(['_token', '_method']));

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
       $deleted = $this->mark->where('id', $id)->delete();

        if($deleted){
            return redirect()->route('marks.index')->with('message', 'Excluído com sucesso!');
        }
    
        return redirect()->route('marks.index')->with('message', 'Erro ao excluir!');
    }
}
