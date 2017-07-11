<?php
// shortcode
function go_to_webinar_calendar( $atts ) {
    $options = get_option('gotowebinar_settings');
    $a = shortcode_atts( array(
            'timezone' => 'fGnTS2Jw',
            'include' => 'QZRS7VSd',
            'exclude' => 'uc4hvp8K',
            'hide' => '',
            'days' => '1825',
        ), $atts );
global $time_zone_list;
    
//call upcoming webinars function and store responses as variables    
$transientName = 'gtw_upc_'.current_time( 'd', $gmt = 0 );
list($jsondata,$json_response) = wp_gotowebinar_upcoming_webinars($transientName, 86400);    

    if($json_response == 200){   
        
        
        $html = '';
        
        $calendarData = array();
        
        
        foreach ($jsondata as $data) {
            foreach($data['times'] as $mytimes) {
                
                $temporaryArray = array();
                
                //sets variables for if condition        
                $myExclude = $data['subject'];
                if($a['timezone']=="fGnTS2Jw"){
                $myTimezone = $a['timezone'].' '.$data['timeZone'];   
                } else {     
                $myTimezone = $data['timeZone'];    
                }
                if($a['include']=="QZRS7VSd"){
                $myInclude = $a['include'].' '.$data['subject'];   
                } else {     
                $myInclude = $data['subject'];    
                }     

                //gets the variable days which is either default 9999 or user set and add it onto today's date       
                $dateOne = date('Y-m-d', strtotime('+'.$a['days'].' days'));   
                //gets the date of the webinar        
                $dateTwo = $mytimes['startTime']; 
                //convert the date of the webinar to the same format as the variable         
                $dateTwoMod = date('Y-m-d', strtotime($dateTwo));   
                //create new datetimes for the 2 date variables        
                $ref = new DateTime($dateOne);
                $date = new DateTime($dateTwoMod);
                //get the difference between the 2 dates        
                $diff = $ref->diff($date);   
                
                
                if(strpos($myTimezone, $a['timezone']) !== false && strpos($myInclude, $a['include']) !== false && strpos($myExclude, $a['exclude']) === false && $diff->format('%R%a') <0){
                    //webinar title
                    $webinarTitle = str_replace($a['hide'],"",$data['subject']);
                    //add title to temporary array
                    $temporaryArray['title'] = $webinarTitle;
                    //webinar registration link                       
                    if($options['gotowebinar_custom_registration_page'] == "default"){       
                        $webinarLink = $data['registrationUrl'];
                    } else {
                        $webinarLink = get_permalink($options['gotowebinar_custom_registration_page'])."?webinarKey=".$data['webinarKey']."&hide=".$a['hide'];
                    }
                    //add link to temporary array
                    $temporaryArray['url'] = $webinarLink;
                    //webinar id
                    $webinarId = $data['webinarKey'];
                    $temporaryArray['id'] = $webinarId;
                    //webinar start
                    $webinarStart = $mytimes['startTime'];
                    $temporaryArray['start'] = $webinarStart;
                    //webinar end
                    $webinarEnd = $mytimes['endTime'];
                    $temporaryArray['end'] = $webinarEnd;

                } //end if condition
                
                if(count($temporaryArray)>0){
                    array_push($calendarData,$temporaryArray);
                }
     

            } //end time loop
        } //end primary loop
        
        /* 
        highlight_string("<?php\n\$data =\n" . var_export($calendarData, true) . ";\n?>");
        */
        
        
        
        $html .= '<div id="calendar-data" data="'.base64_encode(json_encode($calendarData)).'"></div>';
        
        
        $html .= '<div id="calendar"></div>';
        

        return $html; 
    
    
    } //stop if status is 200 and display the below error message if an error is being sent from GoToWebinar
    else {
        
        echo "Something's not working. It looks like the API call to GoToWebinar isn't succeeding. This may be because you are on a trial account. Unfortunately API calls can't be made to GoToWebinar accounts on a trial. If you do have a full GoToWebinar licence please try re-authenticating the plugin again by pressing the 'Click here to get Auth and Key' button in the plugin settings. You should also clear the cache or turn the cache off in the plugin settings and this should resolve the issue.";
        
    }
    
    
    
}
add_shortcode('gotowebinar-calendar', 'go_to_webinar_calendar');
?>