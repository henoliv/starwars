<?php

namespace App\Http\Controllers;

use App\Planeta;
use App\PlanetaExterno;
use Illuminate\Http\Request;

class PlanetaController extends Controller
{
    /**
     * Lista todos os planetas do banco de dados
     *
     * @return void
     */
    public function list()
    {
        return response()->json(Planeta::All(), 200);
    }

    /**
     * Busca um planeta pelo ID
     *
     * @return void
     */
    public function findByID($id)
    {
        return response()->json(Planeta::find($id), 200);
    }

    /**
     * Lista um planeta pelo Nome
     *
     * @return void
     */
    public function findByName($nome)
    {
        return response()->json(Planeta::where('nome', urldecode($nome))->first(), 200);
    }

    /**
     * Armazena um planeta no banco de dados
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $rules = [
            'nome' => 'required|unique:planetas',
            'clima' => 'required',
            'terreno' => 'required'
        ];

        $this->validate($request, $rules);

        $planeta = Planeta::create([
            'nome' => $request->get('nome'),
            'clima' => $request->get('clima'),
            'terreno' => $request->get('terreno'),
            'filmes' => PlanetaExterno::getMovieCount($request->get('nome'))
        ]);

        return response()->json($planeta, 201);
    }

    /**
     * Remove um planeta do banco de dados
     *
     * @param $id
     * @return void
     */
    public function delete($id)
    {
        Planeta::findOrFail($id)->delete();
        return response()->json([], 204);
    }
}
