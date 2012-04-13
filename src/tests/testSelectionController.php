<?php

    require_once dirname(__FILE__).'/../controller/SelectionController.php';
    
    /**
    * User
    */
    class SelectionControllerTestCase extends PHPUnit_Framework_TestCase
    {   
        public function setUp()
        {}
        
        public function tearDown()
        {}
        
        public function testShouldDetectLoginFormSubmitted()
        {
            $input = "1\\'2";
            $sanitizedInput = SelectionController::sanitizeFormInput($input);
            
            $this->assertEquals($sanitizedInput, "1'2");
        }
    }
    
?>