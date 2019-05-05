<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface NewsCateRepository.
 *
 * @package namespace App\Repositories;
 */
interface NewsCateRepository extends RepositoryInterface
{
    public function getRoute($slug);
     public function checkRouteName($input,$id);
     public function datatable($input);
     public function store($input);
     public function update(array $input,$id);
     public function delete($id);
}
