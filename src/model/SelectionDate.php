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
            if ($date['mon'] == 1)
            {
              $date['mon'] = 12;
              $date['year'] = $date['year'] - 1;
            }
            else
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