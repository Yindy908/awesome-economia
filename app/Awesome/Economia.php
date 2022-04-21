<?php

namespace App\awesome;

class Economia{
    /**
     * url base da api
     * @var string 
     */
    const BASE_URL = 'https://economia.awesomeapi.com.br/json';

    /**
     * metodo para consultar moedas
     * @param string $moedaA
     * @param string $moedaB
     * @return array 
     */
    public function consultarCotacao($moedaA, $moedaB){
        return $this->get('/last/'.$moedaA.'-'.$moedaB);
    }

    /**
     * @param string $resource
     * @return array
     */
    public function get($resource){
        //endpoint
        $endpoint = self::BASE_URL.$resource;

        //inicia o curl
        $curl = curl_init();

        //configurações do curl
        curl_setopt_array($curl,[
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ]);

        //response
        $response = curl_exec($curl);

        //fecha a conexão
        curl_close($curl);

        //retorna o resultado
        return json_decode($response, true);
    }
}