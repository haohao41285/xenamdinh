<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TinTucRepository;
use App\Models\TinTuc;
use App\Validators\TinTucValidator;
use HTMLDomParser;

/**
 * Class TinTucRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TinTucRepositoryEloquent extends BaseRepository implements TinTucRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TinTuc::class;
    }
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    public function getHtml()
    {
        $html=HTMLDomParser::file_get_html("https://autopro.com.vn/van-hoa-xe.chn");
        return $html;
    }
    public function getList($p)
    {
        $list=$this->getHtml()->find($p,0);
        return $list;
    }
    public function getAvas($list,$e)
    {
        $stt=-1;
        $elements=[];
        foreach ($list as $element) {
            $stt++;
            $element=$this->getHtml()->find($e,$stt)->src;
            $elements[$stt]=$element;
        }
        return $elements;
    }
    public function getTitles($list,$e)
    {
        $stt=-1;
        $elements=[];
        foreach ($list as $element) {
            $stt++;
            $element=$this->getHtml()->find($e,$stt)->plaintext;
            $elements[$stt]=$element;
        }
        return $elements;
    }
    public function create($a)
    {
        $this->model->create($a);
    }
    
}
