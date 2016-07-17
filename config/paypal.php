<?php
return array(
    // set your paypal credential
    'client_id' => 'AW-8nDPUgijsSuffgM0EOyuXUZgXGeSSXRjA0ZPgdO11fFDZ7bXZ3KbRZej-IHdBtveItNg_MJRfF2E7',
    'secret' => 'EDreEji3GkwMVCYMaZIP9AQjMJEOCFz89QBIYm0Y_QqArNSuXGvigigRZmm8H0oZzvOy6XZG2y1bEwpT',
    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);