<?php return array(
    // set your paypal credential
    'client_id' => 'AU97LvINGSbg6WrC7lQIBbiQeqyoQ68JwsRPjFQwz9QDw_bjm_9rHLbM2Vv_1YLqLGIyVjkIDyLHn7SU',
    'secret' => 'EPfs6ERqrvgbY_6yITdGe-tcmqZtzmXCDSx7RDzcf8J1h4PU0QrNpkAJxRdaObIa1Mo4z_UXPQZGyjW7',

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
?>