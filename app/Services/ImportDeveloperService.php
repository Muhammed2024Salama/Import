<?php

namespace App\Services;

use App\Interface\ImportDeveloperInterface;
use Illuminate\Http\Request;

class ImportDeveloperService
{
    /**
     * @var ImportDeveloperInterface
     */
    protected ImportDeveloperInterface $importDeveloper;

    /**
     * @param ImportDeveloperInterface $importDeveloper
     */
    public function __construct(ImportDeveloperInterface $importDeveloper)
    {
        $this->importDeveloper = $importDeveloper;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function handleImport(Request $request): array
    {
        return $this->importDeveloper->import($request);
    }
}
