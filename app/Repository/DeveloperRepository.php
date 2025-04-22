<?php

namespace App\Repository;

use App\Interface\DeveloperInterface;
use App\Models\Developer;

class DeveloperRepository implements DeveloperInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|mixed
     */
    public function all()
    {
        return Developer::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Developer::findOrFail($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return Developer::create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        $developer = Developer::findOrFail($id);
        $developer->update($data);
        return $developer;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $developer = Developer::findOrFail($id);
        return $developer->delete();
    }
}
