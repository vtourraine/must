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
                $strings['[S-'.$i.'-ARTIST]'] = utf8_decode($selections[$index]->artist);
                $strings['[S-'.$i.'-TITLE]'] = utf8_decode($selections[$index]->title);
                $strings['[S-'.$i.'-COVER-URL]'] = utf8_decode($selections[$index]->coverURL);
                $strings['[S-'.$i.'-PLAY-URL]'] = utf8_decode($selections[$index]->playURL);
            }
            
            MainTemplates::echoContentOfFileByReplacingStrings(dirname(__FILE__).'/EditSelectionForm.html', $strings);
        }
    }

?>