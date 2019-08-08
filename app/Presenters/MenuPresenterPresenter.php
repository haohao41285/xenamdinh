<?php

namespace App\Presenters;

use App\Transformers\MenuPresenterTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MenuPresenterPresenter.
 *
 * @package namespace App\Presenters;
 */
class MenuPresenterPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MenuPresenterTransformer();
    }
}
