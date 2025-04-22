<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Base\Controller;
use App\Services\DeveloperService;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    use ImageUploadTrait;

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
        $developers = $this->developerService->getAllDevelopers();
        return ResponseHelper::success('success', 'Developers fetched successfully', $developers);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('logo')) {
            $data['logo'] = $this->uploadImage($request, 'logo', 'uploads');
        }

        $developer = $this->developerService->createDeveloper($data);
        return ResponseHelper::success('success', 'Developer created successfully', $developer);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $developer = $this->developerService->getDeveloperById($id);
        return ResponseHelper::success('success', 'Developer fetched successfully', $developer);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $developer = $this->developerService->getDeveloperById($id);
        $data = $request->all();

        if ($request->hasFile('logo')) {
            $data['logo'] = $this->updateImage($request, 'logo', 'uploads', $developer->logo);
        }

        $developer = $this->developerService->updateDeveloper($id, $data);
        return ResponseHelper::success('success', 'Developer updated successfully', $developer);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $developer = $this->developerService->getDeveloperById($id);
        if ($developer->logo) {
            $this->deleteImage($developer->logo);
        }

        $this->developerService->deleteDeveloper($id);
        return ResponseHelper::success('success', 'Developer deleted successfully');
    }
}
