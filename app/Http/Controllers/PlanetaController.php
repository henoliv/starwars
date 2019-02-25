<?php

namespace App\Http\Controllers;

use App\Planeta;

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
    public function searchByID($id)
    {
        return response()->json(Planeta::find($id), 200);
    }

    /**
     * Lista um planeta pelo Nome
     *
     * @return void
     */
    public function searchByName($nome)
    {
        return response()->json(Planeta::where('nome', $nome)->first(), 200);
    }
}
