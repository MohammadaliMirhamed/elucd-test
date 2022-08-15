<?php

declare(strict_types=1);

namespace App\Http\Service;

class HttpService
{
    /**
     * send get request
     * @param string $url
     * @param array $headers
     * @return mixed
     */
    public function get(string $url, array $headers = []): mixed
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }

    /**
     * send post request
     * @param string $url
     * @param array $params
     * @param array $headers
     * @return mixed
     */
    public function post(string $url, array $params, array $headers): mixed
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params, JSON_THROW_ON_ERROR));

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
}
