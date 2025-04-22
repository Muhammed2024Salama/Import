<?php

namespace App\Interface;
use Illuminate\Http\Request;

interface ImportDeveloperInterface
{
    /**
     * @param Request $request
     * @return array
     */
    public function import(Request $request): array;
}
