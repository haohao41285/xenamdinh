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
    public function delete($id);
    public function datatable($input);

    //FRONTEND

    public function getLatestNews($amount);
    public function getMostRead($news_cate,$amount);
    public function newsHot();
}
