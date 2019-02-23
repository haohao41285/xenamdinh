<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CustomerNewsRepository.
 *
 * @package namespace App\Repositories;
 */
interface CustomerNewsRepository extends RepositoryInterface
{
    public function store($input);

    public function getNews($customer_id = null,$parent_id);
}
