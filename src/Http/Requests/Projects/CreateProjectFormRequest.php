<?php namespace Ixudra\Portfolio\Http\Requests\Projects;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Interfaces\Services\Validation\ProjectValidationHelperInterface;

use App;

class CreateProjectFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return App::make( ProjectValidationHelperInterface::class )
            ->getFormValidationRules( 'create' );
    }

    public function getInput($includeFiles = false)
    {
        $input = parent::getInput( $includeFiles );

        $input[ 'hidden' ] = $this->convertToTruthyValue( $input, 'hidden' );

        return $input;
    }

}
