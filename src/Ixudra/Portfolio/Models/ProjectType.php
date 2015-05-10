<?php namespace Ixudra\Portfolio\Models;


use Illuminate\Database\Eloquent\Model;
use Ixudra\Portfolio\Interfaces\Models\ProjectTypeInterface;
use Laracasts\Presenter\PresentableTrait;

use Config;

class ProjectType extends Model implements ProjectTypeInterface {

    use PresentableTrait;


    protected $table = 'project_types';

    protected $fillable = array( 'name' );

    protected $guarded = array();

    protected $hidden = array();

    protected $translationKey = 'projectType';

//    protected $presenter = '\Ixudra\Portfolio\Interfaces\Presenters\ProjectTypePresenterInterface';
    protected $presenter = '\Ixudra\Portfolio\Presenters\ProjectTypePresenter';


    public static function getRules()
    {
        return array(
            'name'                  => 'required|max:64'
        );
    }

    public static function getDefaults()
    {
        return array(
            'name'                  => '',
        );
    }

}
