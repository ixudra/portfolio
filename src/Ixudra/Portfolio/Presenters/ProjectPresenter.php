<?php namespace Ixudra\Portfolio\Presenters;


use Translate;

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

    public function projectStatus()
    {
        return Translate::recursive('portfolio::statuses.project.'. $this->status, array());
    }

}