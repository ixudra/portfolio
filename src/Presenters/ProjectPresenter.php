<?php namespace Ixudra\Portfolio\Presenters;


use Ixudra\Core\Presenters\BasePresenter;
use Ixudra\Portfolio\Interfaces\Presenters\ProjectPresenterInterface;

use Translate;

class ProjectPresenter extends BasePresenter implements ProjectPresenterInterface {

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