<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Services\ImportDeveloperService;
use Illuminate\Http\Request;

class DeveloperImportController extends Controller
{
    /**
     * @var ImportDeveloperService
     */
    protected ImportDeveloperService $service;

    /**
     * @param ImportDeveloperService $service
     */
    public function __construct(ImportDeveloperService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function import(Request $request)
    {
        try {
            $result = $this->service->handleImport($request);

            return response()->json([
                'success' => true,
                'message' => $result['message'],
                'data' => $result['data'],
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
