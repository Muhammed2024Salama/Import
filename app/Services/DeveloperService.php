<?php

namespace App\Services;

use App\Interface\DeveloperInterface;

class DeveloperService
{
    protected $developerRepo;

    public function __construct(DeveloperInterface $developerRepo)
    {
        $this->developerRepo = $developerRepo;
    }

    public function getAllDevelopers()
    {
        return $this->developerRepo->all();
    }

    public function getDeveloperById($id)
    {
        return $this->developerRepo->find($id);
    }

    public function createDeveloper($data)
    {
        return $this->developerRepo->create($data);
    }

    public function updateDeveloper($id, $data)
    {
        return $this->developerRepo->update($id, $data);
    }

    public function deleteDeveloper($id)
    {
        return $this->developerRepo->delete($id);
    }
}
