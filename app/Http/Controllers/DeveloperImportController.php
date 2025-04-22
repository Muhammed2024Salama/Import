<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
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
            // Call the service to handle the import
            $result = $this->service->handleImport($request);

            // Use the ResponseHelper to send a success response
            return ResponseHelper::success(
                'success',
                $result['message'],
                $result['data']
            );
        } catch (\Throwable $th) {
            // Use the ResponseHelper to send an error response
            return ResponseHelper::error(
                'error',
                $th->getMessage(),
                500
            );
        }
    }
}
