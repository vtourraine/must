<?php

    /**
    * Session
    */
    class Session
    {
        private $data = array();
        
        /**
        * start
        */
        public function start()
        {
            session_start();
            $this->data = $_SESSION;
        }
        
        /**
        * isLoggedIn
        */
        public function isLoggedIn()
        {
            if (isset($data['KSMLogin']) && isset($data['KSMPasswordMD5']))
            {
                return true;
            }
            
            return false;
        }
    }

?>