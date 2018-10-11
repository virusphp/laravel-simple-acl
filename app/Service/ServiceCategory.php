<?php

namespace App\Service;

use App\Repository\RepoCategory;

class ServiceCategory
{
    protected $repo;

    public function __construct()
    {
        $this->repo = new RepoCategory;
    }

    public function serCategory($req)
    {
        $dTable = $this->repo->getData($req);
        return $dTable;
    }
}