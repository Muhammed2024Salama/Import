<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Base\Controller;
use App\Services\DeveloperService;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    /**
     * @var DeveloperService
     */
    protected $developerService;

    /**
     * @param DeveloperService $developerService
     */
    public function __construct(DeveloperService $developerService)
    {
        $this->developerService = $developerService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $developers = $this->developerService->getAll();
        return ResponseHelper::success('success', 'Developers fetched successfully', $developers);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $developer = $this->developerService->getById($id);
        return ResponseHelper::success('success', 'Developer fetched successfully', $developer);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $developer = $this->developerService->create($data);
        return ResponseHelper::success('success', 'Developer created successfully', $developer, 201);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $developer = $this->developerService->update($id, $data);
        return ResponseHelper::success('success', 'Developer updated successfully', $developer);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->developerService->delete($id);
        return ResponseHelper::success('success', 'Developer deleted successfully');
    }
}
