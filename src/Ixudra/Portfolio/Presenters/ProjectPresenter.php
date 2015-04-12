<?php namespace Ixudra\Portfolio\Presenters;


use Ixudra\Core\Presenters\BasePresenter;

class ProjectPresenter extends BasePresenter {

    public function isHidden()
    {
        return $this->truthy( $this->hidden );
    }

    public function hiddenIcon()
    {
        $icon = 'eye-open';
        if( $this->hidden ) {
            $icon = 'eye-close';
        }

        return $icon;
    }

}