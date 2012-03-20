<?php

    /**
    * User
    */
    class MainTemplates
    {   
        /**
        * echoContentOfFile
        */
        public static function echoContentOfFile($filePath)
        {
            $content = file_get_contents($filePath);
            echo $content;
        }
        
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