<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\Firebase;
use App\Libraries\Push;


class NotificationController extends Controller
{
    public function notify() {
        
           $data = json_decode( \request()->getContent() );
        

           $receiver_id = $data->to;
           $notification_title     = $data->notification->title;
           $notification_body     = $data->notification->body;
           $notification_push_type = $data->push_type;
           
        try {
            
                        //$receiver_id = "";
            
                        $firebase = new Firebase();
                        $push     = new Push();
            
            
                        $title = $notification_title ?? '';
            
                        // notification message
                        $body = $notification_body ?? '';
            
                        // push type - single user / topic
                        $push_type = $notification_push_type ?? '';
            
                        $push->setTitle( $title );
                        $push->setMessage( $body );
                        //print_r($title);
                        //print_r($body);
                        $json     = '';
                        $response = '';
            
                        if ( $push_type === 'topic' ) {
                           $json     = $push->getPush();
                           $response = $firebase->sendToTopic( 'global', $json );
                        } else if ( $push_type === 'individual' ) {
                           $json     = $push->getPush();
                           $regId    = $receiver_id ?? '';
                           //print_r($json);
                           $response = $firebase->send( $regId, $json );
                           //print_r("RESPONSE  ".$response);
                           //return $response;
                           return response()->json( [
                              'response' =>  json_decode($response,true)
                           ] );
                        }
            
            
                     } catch ( \Exception $ex ) {
                        return response()->json( [
                           'error'   => true,
                           'message' => $ex->getMessage()
                        ] );
                     }
                    }
}
