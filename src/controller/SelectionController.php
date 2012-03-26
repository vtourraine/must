<?php

    require_once dirname(__FILE__).'/../model/User.php';
    require_once dirname(__FILE__).'/../model/SelectionDate.php';
    require_once dirname(__FILE__).'/../view/EditTemplates.php';

    /**
    * SelectionController
    */
    class SelectionController
    {   
    
        /**
        * isSelectionFormSubmitted
        */
        public static function isSelectionFormSubmitted($formData)
        {
            for ($i = 1; $i <= NUMBER_OF_SELECTIONS; $i++)
            {
                if (!isset($formData['s-'.$i.'-artist']))
                    return false;
                if (!isset($formData['s-'.$i.'-title']))
                    return false;
                if (!isset($formData['s-'.$i.'-coverURL']))
                    return false;
                if (!isset($formData['s-'.$i.'-playURL']))
                    return false;
            }
            
            return true;
        }
        
        /**
        * isSelectionFormSubmitted
        */
        public static function updateSelection($formData, $session)
        {
            $user = new User($session->username());
            $currentDate = SelectionDate::currentDateIdentifier();
            $currentSelection = $user->selections->$currentDate;
            
            for ($i = 1; $i <= NUMBER_OF_SELECTIONS; $i++)
            {
                $index = $i-1;
                
                $currentSelection[$index]->artist   = $formData['s-'.$i.'-artist'];
                $currentSelection[$index]->title    = $formData['s-'.$i.'-title'];
                $currentSelection[$index]->coverURL = $formData['s-'.$i.'-coverURL'];
                $currentSelection[$index]->playURL  = $formData['s-'.$i.'-playURL'];
            }
            
            $user->saveData();
            
            echo '<section><p>Selection updated.</p></section>';
            return true;
        }
        
        /**
        * echoEditForm
        */
        public function echoEditForm($username)
        {
            $user = new User($username);
            EditTemplates::echoEditSelectionForm($user->currentSelection());
        }
    }

?>