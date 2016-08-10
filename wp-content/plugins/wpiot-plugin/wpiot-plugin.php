<?php
/**
* Plugin Name: Bret's WordPress Azure IoT Plugin
* Plugin URI: http://bretstateham.com 
* Description: Demo plug in to post to an Azure IoT Hub when a comment is posted 
* Author: Bret Stateham
* Author URI: http://bretstateham.com 
* Version: 0.0.1
* License: GPLv2
*/

function wpiot_send_iot_message_on_comment_post() {
    //do something

    require __DIR__ . '/vendor/autoload.php';

    $connectionString = 'HostName=wpiothub.azure-devices.net;DeviceId=wpiotsite;SharedAccessKey=SdEzHCKOGLTnVvur7gs0VAgC7wsVsYjzWNlie3Urtg0=';
    $client = new AzureIoTHub\DeviceClient($connectionString);

    $response = $client->sendEvent('Comment Posted!');

    print($response->getStatusCode());
    
}


add_action('comment_post','wpiot_send_iot_message_on_comment_post');