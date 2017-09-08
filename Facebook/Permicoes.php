<?php
/*
<meta 
    http-equiv="refresh" 
    content="1; 
        url='https://www.facebook.com/v2.8/dialog/oauth?client_id=203399743493565&response_type=granted_scopes&redirect_uri=https://dannkestudios.websiteseguro.com/Eddysword/facebook/view.php&scope=pages_messaging'
    "
> 
 */



if(isset($_REQUEST["granted_scopes"])){
 $scopes = $_REQUEST["granted_scopes"]; 
 echo $scopes;
 //$facebookaccessToken
}
else if(isset($_REQUEST["error_reason"])){
    echo "Permição recusada";
    /*
     * YOUR_REDIRECT_URI?
 error_reason=user_denied
 &error=access_denied
 &error_description=The+user+denied+your+request.
     */
}
else{
    require_once 'config.php';
    $meta = "";
    $meta .= "<meta http-equiv=\"refresh\" content=\"1; url='";
    $meta .= "https://www.facebook.com/v2.8/dialog/oauth?";
    $meta .= "client_id=" . $facebookAppId;
    $meta .= "&response_type=granted_scopes";
    $meta .= "&redirect_uri=https://350e7bd2.ngrok.io/projectMoira/laquesis/Permicoes.php";
    $meta .= "&scope="
            . "public_profile,"
            . "user_friends,"
            . "email,"
            . "user_about_me,"
            . "user_actions.books,"
            . "user_actions.fitness,"
            . "user_actions.music,"
            . "user_actions.news,"
            . "user_actions.video,"
            . "user_birthday,"
            . "user_education_history,"
            . "user_events,"
            . "user_games_activity,"
            . "user_hometown,"
            . "user_likes,"
            . "user_location,"
            . "user_photos,"
            . "user_managed_groups,"
            . "user_posts,"
            . "user_relationships,"
            . "user_relationship_details,"
            . "user_religion_politics,"
            . "user_tagged_places,"
            . "user_videos,"
            . "user_website,"
            . "user_work_history,"
            . "read_custom_friendlists,"
            . "read_insights,"
            . "read_audience_network_insights,"
            . "read_page_mailboxes,"
            . "manage_pages,"
            . "publish_pages,"
            . "publish_actions,"
            . "rsvp_event,"
            . "pages_show_list,"
            . "pages_manage_cta,"
            . "pages_manage_instant_articles,"
            . "ads_read,"
            . "ads_management,"
            . "business_management,"
            . "pages_messaging,"
            . "pages_messaging_subscriptions,"
            //only developers
            //. "pages_messaging_payments,"
            . "pages_messaging_phone_number";
    $meta .=  "'\">"; 
    echo $meta;
}
