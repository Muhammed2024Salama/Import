<?php

namespace App\Imports;

use App\Enums\DeveloperStatus;
use App\Models\Developer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class DeveloperImport implements ToModel, WithHeadingRow
{
    use Importable;

    /**
     * @var array
     */
    public array $importedDevelopers = [];

    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Model[]|null
     * @throws \Exception
     */
    public function model(array $row)
    {
        try {
            $cleaned = [];
            foreach ($row as $key => $value) {
                $cleanKey = str_replace(' ', '_', strtolower(trim($key)));
                $cleaned[$cleanKey] = $value;
            }

            if (Developer::where('email', $cleaned['email'] ?? null)->exists()) {
                return null;
            }

            if (!in_array($cleaned['status'] ?? DeveloperStatus::ACTIVE, DeveloperStatus::getValues())) {
                throw new \Exception("Invalid status: " . ($cleaned['status'] ?? ''));
            }

            $developer = Developer::create([
                'name' => $cleaned['name'],
                'email' => $cleaned['email'],
                'phone_number' => $cleaned['phone_number'],
                'website' => $cleaned['website'] ?? null,
                'logo' => $cleaned['logo'] ?? null,
                'description' => $cleaned['description'] ?? null,
                'status' => $cleaned['status'] ?? DeveloperStatus::ACTIVE,
            ]);

            $this->importedDevelopers[] = $developer;

            return $developer;
        } catch (\Exception $e) {
            throw new \Exception("Row error: " . $e->getMessage());
        }
    }
}
