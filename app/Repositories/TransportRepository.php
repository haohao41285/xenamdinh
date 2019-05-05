<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface TransportRepository.
 *
 * @package namespace App\Repositories;
 */
interface TransportRepository extends RepositoryInterface
{
    public function database($input);
    public function find_transport($transport_slug,$route);
    public function store(array $input);
    public function remove($id,$active);
}
