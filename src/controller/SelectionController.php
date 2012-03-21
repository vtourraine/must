<?php

    require_once dirname(__FILE__).'/../model/User.php';
    require_once dirname(__FILE__).'/../view/EditTemplates.php';

    /**
    * SelectionController
    */
    class SelectionController
    {   
    
        public function echoEditForm($username)
        {
            $user = new User($username);
            EditTemplates::echoEditSelectionForm($user);   
        }
    }

?>