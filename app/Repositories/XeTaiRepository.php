<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface XeTaiRepository.
 *
 * @package namespace App\Repositories;
 */
interface XeTaiRepository extends RepositoryInterface
{
    public function getXes($amount,$condition);

    public function getDistinct($column);

    public function store($input,$loai_xe);

}
