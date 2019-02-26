<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Planeta;

class PlanetaTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * /planetas [POST]
     */
    public function testDeveCriarPlaneta(){
        $parameters = [
            'nome' => 'Tatooine',
            'clima' => 'Quente',
            'terreno' => 'Deserto',
        ];

        $this->post("planetas", $parameters, []);
        $this->seeStatusCode(201);
        $this->seeJsonStructure([
            'nome',
            'clima',
            'terreno',
            'filmes',
            'created_at',
            'updated_at'
        ]);
    }

    /**
     * /planetas [GET]
     */
    public function testDeveRetornarPlanetas(){
        $this->get("planetas", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
        '*' =>
            [
                'nome',
                'clima',
                'terreno',
                'filmes',
                'created_at',
                'updated_at'
            ]
        ]);
    }

    /**
     * /planetas/{id} [GET]
     */
    public function testDeveRetornarUmPlaneta(){
        $planeta = factory('App\Planeta')->create();
        $this->get("planetas/1", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'nome',
            'clima',
            'terreno',
            'filmes',
            'created_at',
            'updated_at'
        ]);
    }

    /**
     * /planetas/nome/{nome} [GET]
     */
    public function testDeveRetornarUmPlanetaPorNome(){

        $planeta = factory('App\Planeta')->create(['nome' => 'Tatooine']);

        $this->get("planetas/nome/Tatooine", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'nome',
            'clima',
            'terreno',
            'filmes',
            'created_at',
            'updated_at'
        ]);
    }

    /**
     * /planetas [DELETE]
     */
    public function testDeveDeletarPlaneta(){
        $planeta = factory('App\Planeta')->create();
        $this->delete("planetas/1", [], []);
        $this->seeStatusCode(410);
        $this->seeJsonStructure([]);
    }
}
