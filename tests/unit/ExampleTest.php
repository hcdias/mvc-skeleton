<?php

namespace unit;

use Codeception\Test\Unit;
use MvcSkeleton\Models\ExampleModel;



class ExampleTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected $token = '';

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testFailWrongFields()
    {
        $model = new ExampleModel();
        
        $this->expectException(\Exception::class);
        $model->create(['token'=>123]);
    }

}