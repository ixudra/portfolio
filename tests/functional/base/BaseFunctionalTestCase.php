<?php


class BaseFunctionalTestCase extends BaseUnitTestCase {

    protected function deleteModels()
    {
        $models = func_get_args();
        foreach( $models as $model ) {
            $model->delete();
        }
    }

    protected function truncateTables()
    {
        $tables = func_get_args();
        foreach( $tables as $table ) {
            DB::table($table)->delete();
        }
    }


    protected function assertCollectionContains($expected, $actual)
    {
        foreach( $actual as $object ) {
            $found = false;

            foreach( $expected as $key => $value ) {
                if( $object->id == $value->id ) {
                    unset( $expected[$key] );
                    $found = true;
                    break;
                }
            }

            $this->assertTrue( $found );
        }

        $this->assertTrue( sizeof( $expected ) == 0 );
    }

}
