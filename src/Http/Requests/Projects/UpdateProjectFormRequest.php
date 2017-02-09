<?php namespace Ixudra\Portfolio\Http\Requests\Projects;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Interfaces\Http\Requests\Projects\UpdateProjectFormRequestInterface;

use App;

class UpdateProjectFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make('\Ixudra\Portfolio\Interfaces\Services\Validation\ProjectValidationHelperInterface')
            ->getFormValidationRules( 'update' );
    }

    public function getInput($includeFiles = false)
    {
        $input = parent::getInput( $includeFiles );

        $input[ 'hidden' ] = $this->convertToTruthyValue( $input, 'hidden' );

        return $input;
    }

}
