<?php

    /**
    * User
    */
    class User
    {
        public $username = '';
        public $passwordMD5 = '';
        public $selections = null;
        
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
            $this->selections = $userData->selections;
        }
        
        /**
        * setPassword
        */
        public function setPassword($newPassword)
        {
            $this->passwordMD5 = md5($newPassword);
            return $this->passwordMD5;
        }
        
        /**
        * saveData
        */
        public function saveData()
        {
            $userDataJSON = json_encode($this);
            $userDataPath = dirname(__FILE__).'/../../data/user/'.$this->username.'.json';
            file_put_contents($userDataPath, $userDataJSON);
        }
    }

?>