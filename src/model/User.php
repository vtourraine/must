<?php

    /**
    * User
    */
    class User
    {
        public $username = '';
        public $passwordMD5 = '';
        
        public function setPassword($newPassword)
        {
            $this->passwordMD5 = md5($newPassword);
            return $this->passwordMD5;
        }
    }

?>