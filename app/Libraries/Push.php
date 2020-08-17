<?php

namespace App\Libraries;
   

class Push {

   private $title;
   private $message;
   private $data;
   private $is_background;


   /**
    * @param $title
    */
   public function setTitle( $title ) {
      $this->title = $title;
   }

   /**
    * @param $message
    */
   public function setMessage( $message ) {
      $this->message = $message;
   }


   /**
    * @param $data
    */
   public function setPayload( $data ) {
      $this->data = $data;
   }

   public function setImage($imageUrl) {
    $this->image = $imageUrl;
   }

   public function setIsBackground($is_background) {
     $this->is_background = $is_background;
    }

   /**
    * @return array
    */
   public function getPush() {
      $response = array();
      $response['title']     = $this->title;
      $response['message']   = $this->message;
      //$response['push_type'] = date( 'Y-m-d G:i:s' );

      return $response;
   }

}