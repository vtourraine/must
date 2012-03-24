<?php

    /**
    * Templates
    */
    class Templates
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
        * echoContentOfFileByReplacingStrings
        */
        public static function echoContentOfFileByReplacingStrings($filePath, $strings)
        {
            $content = file_get_contents($filePath);
            
            foreach ($strings as $stringOrigin => $stringNew)
            {
                $content = str_replace($stringOrigin, $stringNew, $content);
            }
            
            echo $content;
        }
    }

?>