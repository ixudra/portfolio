<?php


class BaseRepositoryTestCase extends BaseFunctionalTestCase {

    protected function assertCollectionWithOnlyInstancesOf($type, $items)
    {
        foreach( $items as $item ) {
            $this->assertInstanceOf( $type, $item );
        }
    }

    protected function assertCollectionContainsInOrder($expected, $actual)
    {
        $this->assertTrue( sizeof( $expected ) == sizeof( $actual ) );

        for( $i = 0; $i < sizeof( $actual ); ++$i ) {
            $this->assertEquals( $expected[$i]->id, $actual[$i]->id );
        }
    }

}