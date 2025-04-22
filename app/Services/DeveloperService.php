<?php

namespace App\Services;

use App\Interface\DeveloperInterface;

class DeveloperService
{
    /**
     * @var DeveloperInterface
     */
    protected $developerRepository;

    /**
     * @param DeveloperInterface $developerRepository
     */
    public function __construct(DeveloperInterface $developerRepository)
    {
        $this->developerRepository = $developerRepository;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->developerRepository->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->developerRepository->find($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->developerRepository->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        return $this->developerRepository->update($id, $data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->developerRepository->delete($id);
    }
}
