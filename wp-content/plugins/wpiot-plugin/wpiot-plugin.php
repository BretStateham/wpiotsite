<?php
/**
* Plugin Name: Bret's WordPress Azure IoT Plugin
* Plugin URI: http://bretstateham.com 
* Description: Make the monkey dance on comments 
* Author: Bret Stateham
* Author URI: http://bretstateham.com 
* Version: 0.0.1
* License: GPLv2
*/

function wpiot_send_iot_message_on_comment_post($comment_id, $comment_approved, $comment_data) {
    //do something else

    require __DIR__ . '/vendor/autoload.php';
    
    try {

      ///$connectionString = 'HostName=wpiothub.azure-devices.net;DeviceId=wpiotsite;SharedAccessKey=SdEzHCKOGLTnVvur7gs0VAgC7wsVsYjzWNlie3Urtg0=';
      //$client = new AzureIoTHub\DeviceClient($connectionString);
      //$response = $client->sendEvent('Comment Posted!' . $comment_data);

      //Try posting to Azure Function using Guzzle
       $guzzle = new GuzzleHttp\Client([
         // Base URI is used with relative requests
         'base_uri' => 'http://httpbin.org',
         // You can set any number of default request options.
         'timeout'  => 2.0,
       ]);
      
       $response = $guzzle->post('https://wpiotcode.azurewebsites.net/api/MonkeyDanceHttp');

    } catch (Exception $e) {
        //Do nothing...
    }

    //print($response->getStatusCode());
    
}


add_action('comment_post','wpiot_send_iot_message_on_comment_post', 10, 3);