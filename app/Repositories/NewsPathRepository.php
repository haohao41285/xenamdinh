<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface NewsPathRepository.
 *
 * @package namespace App\Repositories;
 */
interface NewsPathRepository extends RepositoryInterface
{
    public function getElement($content);
}
