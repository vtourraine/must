<?php

    /**
    * User
    */
    class User
    {
        public $username = '';
        public $passwordMD5 = '';
        
        /**
        * constructor
        */
        public function __construct($aUsername)
        {
            $userDataPath = dirname(__FILE__).'/../../data/user/'.$aUsername.'.json';
            
            if (!file_exists($userDataPath))
            {
                throw new Exception();
            }
            
            $userDataJSON = file_get_contents($userDataPath);
            $userData = json_decode($userDataJSON);
            
            if (!$userData || !isset($userData->username) || !isset($userData->passwordMD5))
            {
                throw new Exception();
            }
            
            $this->username = $userData->username;
            $this->passwordMD5 = $userData->passwordMD5;
        }
        
        /**
        * setPassword
        */
        public function setPassword($newPassword)
        {
            $this->passwordMD5 = md5($newPassword);
            return $this->passwordMD5;
        }
    }

?>