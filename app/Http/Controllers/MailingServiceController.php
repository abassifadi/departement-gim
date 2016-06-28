<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MailingServiceController extends Controller
{
    public static function notifyUserWithMail($subject,$message,$receiver){

      $entetedate  = date("D, j M Y H:i:s -0600");
$headers ='From: "contact@wizzproducts.com'."".'"< contact@wizzproducts.com>'."\n";
$headers .="Reply-To: contact@webrtgl.net"."\n";
$headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
$headers .= 'Content-Transfer-Encoding: 8bit"'."\n";
$headers .= "Date: $entetedate \n";
$headers .='X-Mailer: PHP/' . phpversion();
$message =  $message ;
     //mail ($receiver , $subject , $message , $headers ) ;

    }
}
