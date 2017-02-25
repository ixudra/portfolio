<?php namespace Ixudra\Portfolio\Models;


use Illuminate\Database\Eloquent\Model;
use Ixudra\Portfolio\Interfaces\Models\ProjectTypeInterface;
use Ixudra\Portfolio\Presenters\ProjectTypePresenter;
use Laracasts\Presenter\PresentableTrait;

class ProjectType extends Model implements ProjectTypeInterface {

    use PresentableTrait;


    protected $table = 'project_types';

    protected $fillable = array( 'name' );

    protected $guarded = array();

    protected $hidden = array();

    protected $translationKey = 'projectType';

    protected $presenter = ProjectTypePresenter::class;


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
