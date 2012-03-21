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
    }

?>