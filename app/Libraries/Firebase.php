<?php

namespace App\Libraries;
use GuzzleHttp\Client;

class Firebase {

   /**
    * Sending push message to single user by Firebase Registration ID
    * @param $to
    * @param $message
    *
    * @return bool|string
    */
   public function send( $to, $message ) {

      $fields = array(
         'to'   => $to,
         'data' => $message,
      );

      //print_r($fields);
      return $this->sendPushNotification( $fields );
   }


   /**
    * Sending message to a topic by topic name
    * @param $to
    * @param $message
    *
    * @return bool|string
    */
   public function sendToTopic( $to, $message ) {
      $fields = array(
         'to'   => '/topics/' . $to,
         'data' => $message,
      );

      return $this->sendPushNotification( $fields );
   }


   /**
    * Sending push message to multiple users by firebase registration ids
    * @param $registration_ids
    * @param $message
    *
    * @return bool|string
    */
   public function sendMultiple( $registration_ids, $message ) {
      $fields = array(
         'to'   => $registration_ids,
         'data' => $message,
      );

      return $this->sendPushNotification( $fields );
   }
   /*private function sendPushNotification( $fields ) {
    
       // Set POST variables
       $url = 'https://fcm.googleapis.com/fcm/send';
    
       $client = new Client();
    
       $result = $client->post( $url, [
          'json'    =>
             $fields
          ,
          'headers' => [
             'Authorization' => 'key='.env('FCM_LEGACY_KEY'),
             'Content-Type'  => 'application/json',
          ],
       ] );
    
    
       return json_decode( $result->getBody(), true );
    
    }*/

   /**
    * CURL request to firebase servers
    * @param $fields
    *
    * @return bool|string
    */
   private function sendPushNotification( $fields ) {

    $data1 = json_encode($fields);
    //print_r("true ".$data1);
    //FCM API end-point
    $url = 'https://fcm.googleapis.com/fcm/send';
    //api_key in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
    //$server_key = 'YOUR_KEY';
    //header with content_type api key
    $headers = array(
        'Content-Type:application/json',
        'Authorization: key=AAAAeB3pdIE:APA91bGIugWgZuAc8pO7XH6Myr4eTuSdsWRt-UKsifWnRBIOuQFCQ8DhayKOUTwvqWQdBPlj9WsM7m4XdIwT9YFdF8ZSNrQWZkAge_1mdHAHHR_2gxgNZ88OpBQyuReEtLjty6VTJjCk'
    );
    //CURL request to route notification to FCM connection server (provided by Google)
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('Oops! FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);
    return $result;
    }
    

}