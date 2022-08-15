<?php

declare(strict_types=1);

namespace App\Http\Service;

use Carbon\Carbon;

class InstitutionService
{
    private HttpService $httpService;
    private $apiUrl;
    private $apiKey;

    /**
     * InstitutionService constructor.
     */
    public function __construct(HttpService $httpService)
    { 
        $this->httpService = $httpService;

        $this->apiUrl = env('ELUCIDATE_API_SERVICE_HOST');
        $this->apiKey = env('ELUCIDATE_API_SERVICE_TOKEN');
    }

    /**
     * find institutions by name
     * @param string $name
     * @return array
     */
    public function find(string $name): array
    {
        $url = $this->apiUrl . "/institutions?fullSearch=". $name;

        $response = $this->httpService->get($url,$this->apiHeader());

        return json_decode($response, true);
    }

    /**
     * add institution
     * @param string $name
     * @return array
     */
    public function add(string $name): array
    {
        $url = $this->apiUrl . '/tickets';

        $params = [
            'project' => 'projects/2a9caad1-19c7-4340-949f-30b81a8a043e',
            'title' => $name,
            'description' => 'add Institution',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $response = $this->httpService->post($url, $params, $this->apiHeader());

        return json_decode($response, true);
    }

    /**
     * prepare headers for api request
     * @return array
     */
    private function apiHeader(): array
    {
        return [
            "Accept: application/json",
            "Content-Type: application/json",
            "Authorization: " . "Bearer " . $this->apiKey,
        ];
    }
}
