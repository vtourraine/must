<?php

    require_once dirname(__FILE__).'/Templates.php';
    
    /**
    * MainTemplates
    */
    class MainTemplates extends Templates
    {   
        /**
        * echoMainHeader
        */
        public static function echoMainHeader()
        {
            MainTemplates::echoContentOfFile(dirname(__FILE__).'/MainHeader.html');
        }
        
        /**
        * echoMainFooter
        */
        public static function echoMainFooter()
        {
            MainTemplates::echoContentOfFile(dirname(__FILE__).'/MainFooter.html');
        }
        
        /**
        * echoLoginForm
        */
        public static function echoLoginForm()
        {
            MainTemplates::echoContentOfFile(dirname(__FILE__).'/LoginForm.html');
        }
    }

?>