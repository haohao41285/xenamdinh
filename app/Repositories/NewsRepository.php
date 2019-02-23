<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface NewsRepository.
 *
 * @package namespace App\Repositories;
 */
interface NewsRepository extends RepositoryInterface
{
    public function relatedNews();
    public function create($a);
    public function latest($amount);
    public function getLastNews();
}
