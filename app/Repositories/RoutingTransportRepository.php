<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface RoutingTransportRepository.
 *
 * @package namespace App\Repositories;
 */
interface RoutingTransportRepository extends RepositoryInterface
{
     public function getRoute($slug);
     public function checkRouteName($input,$id);
     public function datatable($input);
     public function store($input);
     public function update(array $input,$id);
     public function remove($id,$active);
}