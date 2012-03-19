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
            if (isset($formData['login']) && isset($formData['password']))
            {
                return true;
            }
            
            return false;
        }
    }

?>