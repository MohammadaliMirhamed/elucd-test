<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Service\InstitutionService;
use Illuminate\Http\JsonResponse;

class InstitutionController extends Controller
{
    private InstitutionService $institutionService;

    public function __construct(InstitutionService $institutionService)
    {
        $this->institutionService = $institutionService;
    }

    /**
     * @param string $name
     * @return JsonResponse
     */
    public function search(string $name): JsonResponse
    {
        try {
            
            // get institutions from service
            $institutions = $this->institutionService->find($name);

            // if does not exist add new
            if(count($institutions) === 0)
            {
                $newInstitution = $this->institutionService->add($name);
                return response()->json($newInstitution);
            }

            return response()->json($institutions);

        } catch (\Exception $exception){
            return response()->json($exception->getMessage());
        }
    }
}
