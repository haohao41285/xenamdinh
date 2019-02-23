<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface XeKhachRepository.
 *
 * @package namespace App\Repositories;
 */
interface XeKhachRepository extends RepositoryInterface
{
    public function getXes($amount,$condition);

    public function getDistinct($column);

    public function store($input,$loai_xe);
}
