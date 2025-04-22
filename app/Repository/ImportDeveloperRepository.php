<?php

namespace App\Repository;

use App\Interface\ImportDeveloperInterface;
use App\Imports\DeveloperImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportDeveloperRepository implements ImportDeveloperInterface
{
    /**
     * @param Request $request
     * @return array
     */
    public function import(Request $request): array
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls',
        ]);

        $import = new DeveloperImport();
        Excel::import($import, $request->file('file'));

        return [
            'message' => 'Developers imported successfully.',
            'data' => $import->importedDevelopers,
        ];
    }
}
