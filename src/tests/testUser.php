<?php

    require_once dirname(__FILE__).'/../model/User.php';
    
    /**
    * User
    */
    class UserTestCase extends PHPUnit_Framework_TestCase
    {
        private $user = null;
        
        public function setUp()
        {
            $this->user = new User();
        }
        
        public function tearDown()
        {
            unset($this->user);
        }
        
        public function testSetNewPassword()
        {
            $newPassword = 'abcdefg';
            $this->user->setPassword($newPassword);
            
            $this->assertEquals($this->user->password, md5($newPassword));
        }
    }
    
?>