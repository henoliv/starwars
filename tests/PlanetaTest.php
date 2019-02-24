<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Planeta;

class PlanetaTest extends TestCase
{
    public function testInstanciaPlaneta(){
        $planeta = new Planeta();

        $this->assertInstanceOf(
            Planeta::class,
            $planeta
        );
    }
}
