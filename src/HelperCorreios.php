<?php


namespace GHSA;


/**
 * Métodos de ajuda para manipulação de dados do correio
 *
 * Gustavo H. S. Andrade
 */

class HelperCorreios
{

    /**
     * Classe de Busca de CEP
     */
    public static function getEnderecoCEP($cep)
    {
        $cep = str_replace("-", "", $cep);

        if(strlen($cep) == 8 AND is_numeric($cep)){
            $request = file_get_contents("https://viacep.com.br/ws/".$cep."/json");
        }else{
            $request = 0;
        }

        return $request;
    }

    public static function getValorFrete($peso, $cepOrigem, $cepDestino)
    {
        $peso       = str_replace(".", ",", $peso);

        $url = "https://pagseguro.uol.com.br/desenvolvedor/simulador_de_frete_calcular.jhtml?postalCodeFrom=".$cepOrigem."&weight=".$peso."&value=0,00&postalCodeTo=".$cepDestino;

        try{

            //$uri = $uri = "http://" . $this->ip . ":" . $this->porta;
            $curl = curl_init($url);

            curl_setopt_array($curl,
                [
                    CURLOPT_HTTPHEADER => [
                        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
                        'Cache-Control: max-age=0',
                        'Connection: keep-alive',
                    ],
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_VERBOSE => 1
                ]);

            $out = curl_exec($curl);
            curl_close($curl);

            $json = explode("|", $out);

            return $json;



        }catch (\Exception $e)
        {
            return $e->getMessage();
        }




    }


}