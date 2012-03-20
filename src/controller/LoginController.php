<?php

    /**
    * LoginController
    */
    class LoginController
    {   
    
        /**
        * echoLoginForm
        */
        public static function isLoginFormSubmitted($formData)
        {
            if (isset($formData['username']) && isset($formData['password']))
            {
                return true;
            }
            
            return false;
        }
        
        /**
        * logIn
        */
        public static function logIn($formData, &$session)
        {
            $formUsername = $formData['username'];
            $formPassword = $formData['password'];
            
            // todo
            // check against real login/password values
            
            $session->logIn($formUsername, $formPassword);
            
            return false;
        }
    }

?>