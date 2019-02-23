<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface TuyenDungRepository.
 *
 * @package namespace App\Repositories;
 */
interface TuyenDungRepository extends RepositoryInterface
{
    public function latest($amount);

    public function update(array $input,$id);

    public function delete($id);
}
