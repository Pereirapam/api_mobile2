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
        return response()->json(['data' => $marks]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateMarkRequest $request)
    {
      $created = $this->mark->create([
            'markName' => $request -> input('markName')
      ]);

      if($created){
       return response()->json($created, 201);
       }
       return response()->json(['message' => 'Erro ao criar marca!'], 500);

    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $mark = $this->mark->find($id);

        if (!$mark) {
            return response()->json(['message' => 'Marca não encontrada'], 404);
        }

        return response()->json($mark);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateMarkRequest $request, string $id)
    {

       $mark = $this->mark->find($id);

        if(!$mark){
            return response()->json(['message' => 'Marca não encontrada'], 404);
        }

        $mark->update($request->only('markName'));
       return response()->json($mark);
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $mark = $this->mark->find($id);

       if(!$mark){
            return response()->json(['message' => 'Marca não encontrada'], 404);
        }
       $deleted = $this->mark->where('id', $id)->delete();

      return response()->json(['message' => 'Foi excluido']);
}}