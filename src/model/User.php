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
        * pathToDataFile
        */
        public static function pathToDataFile($aUsername)
        {
            return dirname(__FILE__).'/../../data/user/'.$aUsername.'.json';
        }
        
        /**
        * createNewUser
        */
        public static function createNewUser($aUsername, $aPassword)
        {
            $userData = (object) array('username'=>$aUsername, 'passwordMD5'=>md5($aPassword), 'selections'=>(object)array());
            $userDataPath = User::pathToDataFile($aUsername);
            $userDataJSON = json_encode($userData);
            file_put_contents($userDataPath, $userDataJSON);
        }
        
        /**
        * constructor
        */
        public function __construct($aUsername)
        {
            $userDataPath = User::pathToDataFile($aUsername);
            
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
            $userDataPath = User::pathToDataFile($this->username);
            file_put_contents($userDataPath, $userDataJSON);
        }
    }

?>