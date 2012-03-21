<?php

    require_once dirname(__FILE__).'/Templates.php';
    
    /**
    * EditTemplates
    */
    class EditTemplates extends Templates
    {   
        /**
        * echoEditSelectionForm
        */
        public static function echoEditSelectionForm($user)
        {
            MainTemplates::echoContentOfFile(dirname(__FILE__).'/EditSelectionForm.html');
        }
    }

?>