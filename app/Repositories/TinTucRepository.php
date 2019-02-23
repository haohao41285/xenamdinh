<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface TinTucRepository.
 *
 * @package namespace App\Repositories;
 */
interface TinTucRepository extends RepositoryInterface
{
	public function getHtml();
    public function getList($p);
    public function getAvas($list,$e);
    public function getTitles($list,$e);
    public function create($a);
}
