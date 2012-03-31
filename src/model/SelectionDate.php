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
        * previousDateIdentifier
        */
        public static function previousDateIdentifier()
        {
            $date = getdate();
            $date['mon'] = $date['mon'] - 1;
            return SelectionDate::dateIdentifier($date);
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