<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface TaxiRepository.
 *
 * @package namespace App\Repositories;
 */
interface TaxiRepository extends RepositoryInterface
{
    public function getXes($amount);

    public function getDistinct($column);
    
    public function store($input,$xe);
}
