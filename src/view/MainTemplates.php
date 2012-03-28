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
            if (isset($_GET['new']))
            {
                MainTemplates::echoContentOfFile(dirname(__FILE__).'/CreateUserForm.html');
            }
            else
            {
                MainTemplates::echoContentOfFile(dirname(__FILE__).'/LoginForm.html');
            }
        }
        
        /**
        * echoSelectionTemplate
        */
        public static function echoSelectionTemplate($username, $selection)
        {
            $strings = array('[USERNAME]'=>$username);
            
            for ($i = 1; $i <= NUMBER_OF_SELECTIONS; $i++)
            {
                $index = $i - 1;
                $strings['[S-'.$i.'-ARTIST]'] = utf8_decode($selection[$index]->artist);
                $strings['[S-'.$i.'-TITLE]'] = utf8_decode($selection[$index]->title);
                
                if ($selection[$index]->coverURL != '')
                    $strings['[S-'.$i.'-COVER-URL]'] = 'src="'.utf8_decode($selection[$index]->coverURL).'" alt="album cover" ';
                else
                    $strings['[S-'.$i.'-COVER-URL]'] = '';
                    
                if ($selection[$index]->playURL != '')
                    $strings['[S-'.$i.'-PLAY-URL]'] = '<a class="play" href="'.utf8_decode($selection[$index]->playURL).'">&#9654;</a>';
                else
                    $strings['[S-'.$i.'-PLAY-URL]'] = '';
            }
            
            MainTemplates::echoContentOfFileByReplacingStrings(dirname(__FILE__).'/Selection.html', $strings);
        }
    }

?>