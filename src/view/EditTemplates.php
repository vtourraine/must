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
        public static function echoEditSelectionForm($selections)
        {
            $strings = array();
            for ($i = 1; $i <= NUMBER_OF_SELECTIONS; $i++)
            {
                $index = $i - 1;
                $strings['[S-'.$i.'-ARTIST]'] = $selections[$index]->artist;
                $strings['[S-'.$i.'-TITLE]'] = $selections[$index]->title;
                $strings['[S-'.$i.'-COVER-URL]'] = $selections[$index]->coverURL;
                $strings['[S-'.$i.'-PLAY-URL]'] = $selections[$index]->playURL;
            }
            
            MainTemplates::echoContentOfFileByReplacingStrings(dirname(__FILE__).'/EditSelectionForm.html', $strings);
        }
    }

?>