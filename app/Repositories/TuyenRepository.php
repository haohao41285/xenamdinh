<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface TuyenRepository.
 *
 * @package namespace App\Repositories;
 */
interface TuyenRepository extends RepositoryInterface
{
    public function findTenTuyen($id);
}
