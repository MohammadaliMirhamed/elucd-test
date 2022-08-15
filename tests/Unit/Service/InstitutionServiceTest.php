<?php

namespace Tests\Unit\Service;

use App\Http\Service\HttpService;
use App\Http\Service\InstitutionService;
use Monolog\Test\TestCase;
use Mockery;

class InstitutionServiceTest extends TestCase
{
    public function testFindWithJsonResultWillReturnArray(): void
    {
        $entry = file_get_contents( __DIR__ . '/vendor/search.json');

        $httpService = Mockery::mock(HttpService::class)
            ->allows('get')
            ->andReturn($entry)
            ->getMock();

        $institutionService = new InstitutionService($httpService);
        $this->assertIsArray($institutionService->find("test"));
    }

    public function testAddWithJsonResultWillReturnArray(): void
    {
        $httpService = Mockery::mock(HttpService::class)
            ->allows('post')
            ->andReturn('[]')
            ->getMock();

        $institutionService = new InstitutionService($httpService);
        $this->assertIsArray($institutionService->add("test"));
    }
}
