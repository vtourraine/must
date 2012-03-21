<?php

    /**
    * SelectionDate
    */
    class SelectionDate
    {
        /**
        * currentDateIdentifier
        */
        public static function currentDateIdentifier()
        {
            $today = getdate();
            return SelectionDate::dateIdentifier($today);
        }
        
        /**
        * dateIdentifier
        */
        public static function dateIdentifier($date)
        {
            $year = $date['year'];
            $padded_month = sprintf("%02s", $date['mon']);
            
            return $year.'-'.$padded_month;
        }
    }

?>