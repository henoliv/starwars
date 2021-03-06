<?php

// Lista os planetas no banco
$router->get('planetas', ['uses' => 'PlanetaController@list']);

// Busca um planeta pelo ID
$router->get('planetas/{id}', ['uses' => 'PlanetaController@findByID']);

// Busca planetas pelo nome
$router->get(
    'planetas/nome/{nome}',
    ['uses' => 'PlanetaController@findByName']
);

// Armazena novos planetas
$router->post(
    'planetas/',
    ['uses' => 'PlanetaController@store']
);

// Armazena novos planetas
$router->delete(
    'planetas/{id}',
    ['uses' => 'PlanetaController@delete']
);
