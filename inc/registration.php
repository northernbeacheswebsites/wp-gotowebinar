<?php
//function to register registrant for webinar
function wpgotowebinar_registration_form_submit(){
$options = get_option('gotowebinar_settings');
    
$authorization = $options['gotowebinar_authorization'];    
$organizerKey = $options['gotowebinar_organizer_key']; 
$webinarId = $_POST['webinarId'];   
$data = json_encode($_POST['data']);      
 

$response = wp_remote_post( 'https://api.getgo.com/G2W/rest/organizers/'.$organizerKey.'/webinars/'.$webinarId.'/registrants', array(
	'headers' => array(
		'Content-Type' => 'application/json',
		'Authorization' => $authorization,
		'Content-Type' => 'application/json; charset=utf-8',
	),
	'body' => $data,
) );

if ( ! is_wp_error( $response ) ) {

	if ( 201 == wp_remote_retrieve_response_code( $response ) ) {
        $jsondata = json_decode($response['body'],true); 
        echo $jsondata['joinUrl'];
	} elseif ( 409 == wp_remote_retrieve_response_code( $response ) ) {
        echo "409";
	} elseif ( 403 == wp_remote_retrieve_response_code( $response ) ) {
        echo "403";
	} else {  
        echo "ERROR";   
    }

} else {
	// There was an error making the request
	echo "ERROR";
}    
    

wp_die(); 


   
} //end function
add_action( 'wp_ajax_registration_form_submit', 'wpgotowebinar_registration_form_submit' );
add_action( 'wp_ajax_nopriv_registration_form_submit', 'wpgotowebinar_registration_form_submit' );

?>