<?php

if (! function_exists('getOption')) {
    function getOption($param)
    {
        if('site_emails') {
			return 'info@emergencyplumber.london';
		}
		
		if('site_cc_emails') {
			return 'cc@emergencyplumber.london';
		}
		
		if('site_bcc_emails') {
			return 'bcc@emergencyplumber.london';
		}
    }
}
