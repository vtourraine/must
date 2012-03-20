<?php

    /**
    * Session
    */
    class Session
    {
        private $data = array();
        
        /**
        * start
        */
        public function start()
        {
            session_start();
            $this->data = $_SESSION;
        }
        
        /**
        * isLoggedIn
        */
        public function isLoggedIn()
        {
            if (isset($this->data['username']) && isset($this->data['passwordMD5']))
            {
                return true;
            }
            
            return false;
        }
        
        /**
        * logIn
        */
        public function logIn($username, $password)
        {
            $passwordMD5 = md5($password);
            
            $_SESSION['username'] = $username;
            $_SESSION['passwordMD5'] = $passwordMD5;
            
            $this->data = $_SESSION;
        }
        
        /**
        * logOut
        */
        public function logOut()
        {
            unset($_SESSION['username']);
            unset($_SESSION['passwordMD5']);
            
            $this->data = $_SESSION;
        }
    }

?>