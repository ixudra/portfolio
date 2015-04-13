<?php namespace Ixudra\Portfolio\Http\Requests\Project;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Models\Project;
use Ixudra\Imageable\Models\Image;

class UpdateProjectFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = array_merge(
            Project::getRules(),
            Image::getRules()
        );

        $rules['file'] = $this->makeOptional( $rules['file'] );

        return $rules;
    }

    public function getInput($includeFiles = false)
    {
        $input = parent::getInput( $includeFiles );

        $input[ 'hidden' ] = $this->convertToTruthyValue( $input, 'hidden' );

        return $input;
    }

}
