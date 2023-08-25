<?php
namespace App\Emailverfication;

class emailverfication
{
    public function verfication($id , $email){
       
        \Mail::to($email)->send(new \App\Mail\verfication($id));
        return '1';
    }
}
?>