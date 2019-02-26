<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class PlanetaExterno extends Model
{
    const API_ADDRESS = 'https://swapi.co/api/planets/?search=';

    /**
     * Coleta o número de aparições em filmes na api pública de Star Wars
     *
     * @param string $nome
     * @return string
     */
    public static function getMovieCount(string $nome): string
    {
        // Faz a requisição para a API
        $client = new Client();
        $response = $client->get(self::API_ADDRESS . $nome);

        // Checa a resposta
        $statusCode = (string) $response->getStatusCode();

        if ($statusCode != 200) {
            return "0";
        }

        // Parseia a resposta e retorna o resultado
        $searchResult = json_decode((string) $response->getBody());

        if ($searchResult->count == 0) {
            return "0";
        }

        $planet = current($searchResult->results);

        return (string) count($planet->films);
    }
}
