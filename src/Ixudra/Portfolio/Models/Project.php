<?php namespace Ixudra\Portfolio\Models;


use Illuminate\Database\Eloquent\Model;
use Ixudra\Imageable\Traits\ImageableTrait;
use Ixudra\Portfolio\Interfaces\Models\ProjectInterface;
use Laracasts\Presenter\PresentableTrait;

class Project extends Model implements ProjectInterface {

    use PresentableTrait;
    use ImageableTrait;


    protected $table = 'projects';

    protected $fillable = array(
        'name',
        'contractor_id',
        'customer_id',
        'description',
        'start_date',
        'end_date',
        'status',
        'project_type_id',
        'hidden'
    );

    protected $hidden = array();

    protected $translationKey = 'project';

//    protected $presenter = '\Ixudra\Portfolio\Presenters\ProjectPresenterInterface';
    protected $presenter = '\Ixudra\Portfolio\Presenters\ProjectPresenter';

    protected $imagePath = 'images/projects';


    public function contractor()
    {
        return $this->belongsTo('\Ixudra\Portfolio\Models\CompanyInterface', 'contractor_id');
    }

    public function customer()
    {
        return $this->belongsTo('\Ixudra\Portfolio\Models\CustomerInterface', 'customer_id');
    }

    public function projectType()
    {
        return $this->belongsTo('\Ixudra\Portfolio\Models\ProjectTypeInterface');
    }

    public function image()
    {
        return $this->morphOne('Ixudra\Imageable\Models\Image', 'imageable');
    }


    public static function getRules()
    {
        return array(
            'name'                  => 'required|max:64',
            'contractor_id'         => 'required|integer',
            'customer_id'           => 'required|integer',
            'description'           => 'required',
            'start_date'            => 'required|date',
            'end_date'              => 'required|date',
            'status'                => 'required|in:unknown,open,scheduled,in_development,completed,cancelled',
            'project_type_id'       => 'required|integer',
            'hidden'                => 'required|boolean',
        );
    }

    public static function getDefaults()
    {
        return array(
            'name'                  => '',
            'contractor_id'         => 1,
            'customer_id'           => 0,
            'description'           => '',
            'start_date'            => date('Y-m-d'),
            'end_date'              => date('Y-m-d', strtotime('+1 week')),
            'status'                => 'open',
            'project_type_id'       => 0,
            'hidden'                => true,
        );
    }

    public function delete()
    {
        $this->image->delete();

        parent::delete();
    }

}
