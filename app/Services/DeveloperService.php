<?php

namespace App\Services;

use App\Interface\DeveloperInterface;

class DeveloperService
{
    /**
     * @var DeveloperInterface
     */
    protected $developerRepo;

    /**
     * @param DeveloperInterface $developerRepo
     */
    public function __construct(DeveloperInterface $developerRepo)
    {
        $this->developerRepo = $developerRepo;
    }

    /**
     * @return mixed
     */
    public function getAllDevelopers()
    {
        return $this->developerRepo->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getDeveloperById($id)
    {
        return $this->developerRepo->find($id);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function createDeveloper($data)
    {
        return $this->developerRepo->create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function updateDeveloper($id, $data)
    {
        return $this->developerRepo->update($id, $data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteDeveloper($id)
    {
        return $this->developerRepo->delete($id);
    }
}
