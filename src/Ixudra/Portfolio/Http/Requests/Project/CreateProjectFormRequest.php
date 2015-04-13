<?php namespace Ixudra\Portfolio\Http\Requests\Project;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Models\Project;
use Ixudra\Imageable\Models\Image;

class CreateProjectFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array_merge(
            Project::getRules(),
            Image::getRules()
        );
    }

    public function getInput($includeFiles = false)
    {
        $input = parent::getInput( $includeFiles );

        $input[ 'hidden' ] = $this->convertToTruthyValue( $input, 'hidden' );

        return $input;
    }

}
