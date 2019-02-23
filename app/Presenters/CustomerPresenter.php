<?php

namespace App\Presenters;
use Laracasts\Presenter\Presenter;

/**
 * Class CustomerPresenter.
 *
 * @package namespace App\Presenters;
 */
class CustomerPresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CustomerTransformer();
    }
    public function fullName()
    {
    	return $this->last_name." ".$this->first_name;
    }
}
