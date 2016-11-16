<?php

namespace WS\appBundle\Entity;



class MyApp
{

    protected $url = 'http://127.0.0.1/eS_test/ws/web/app_dev.php';

    public function sendPOST($route, $parameters)
    {
        if (empty($route)) {
            return false;
        }
        $url = $this->url.$route;
        if (count($parameters)) {
            // construction d'une requette http
            $url .= '?'.http_build_query($parameters);

        }

        // initialisation de la session
        $ch = curl_init();

        // configuration des options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //recupère l'exécution de ma session actuelle
        $content = curl_exec($ch);

        //recupère les infos du transfert de ma connexion (url)
        $info = curl_getinfo($ch);

        curl_close($ch);

        return json_decode($content, true);
    }

}

