<?php

    require_once dirname(__FILE__).'/../model/User.php';

    /**
    * LoginController
    */
    class LoginController
    {   
    
        /**
        * isLoginFormSubmitted
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
            
            if (isset($formData['password2']))
            {
                $formPassword2 = $formData['password2'];
                
                if (file_exists(User::pathToDataFile($formUsername)))
                {
                    echo '<section><p>User already exists.</p></section>';
                    return false;
                }
                else if ($formPassword != $formPassword2)
                {
                    echo '<section><p>Please concentrate!</p></section>';
                    return false;
                }
                else
                {
                    User::createNewUser($formUsername, $formPassword);
                    
                    echo '<section><p>Congrats, you\'re in!<br/>(now please log in)</p></section>';
                    
                    return false;
                }
            }
            
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