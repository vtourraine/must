<?php

    require_once dirname(__FILE__).'/../model/User.php';

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
            
            try
            {
                $user = new User($formUsername);
                
                if ($user->passwordMD5 == md5($formPassword))
                {
                    $session->logIn($formUsername, $formPassword);
                    echo '<section><p>Welcome</p></section>';
                }
                else
                {
                    echo '<section><p>Sorry, but I can\'t let you in.</p></section>';
                    return false;
                }
            }
            catch (Exception $e)
            {
                echo '<section><p>Sorry, have we met before?</p></section>';
                return false;
            }
            
            return true;
        }
    }

?>