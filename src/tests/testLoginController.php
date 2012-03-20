<?php

    require_once dirname(__FILE__).'/../controller/LoginController.php';
    
    /**
    * User
    */
    class LoginControllerTestCase extends PHPUnit_Framework_TestCase
    {   
        public function setUp()
        {}
        
        public function tearDown()
        {}
        
        public function testShouldDetectLoginFormSubmitted()
        {
            $formData = array('username'=>'test', 'password'=>'abc');
            $isSubmitted = LoginController::isLoginFormSubmitted($formData);
            
            $this->assertTrue($isSubmitted);
        }
        
        public function testShouldDetectLoginFormNotSubmitted()
        {
            $formData = array('username'=>'test');
            $isSubmitted = LoginController::isLoginFormSubmitted($formData);
            
            $this->assertFalse($isSubmitted);
        }
    }
    
?>