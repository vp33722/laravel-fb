<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class SmsController extends Controller
{
    public function sendSms()
    {


   	$accountSid = 'ACb59cdbfc243d79e8d1dc317fbfcea53f';
	$tokens = 'f9fd4f9e4e12efe8bd86cbabcd9fed81';
	$client = new Client($accountSid, $tokens);

// Use the client to do fun stuff like send text messages!
	$client->messages->create(
    // the number you'd like to send the message to
    '+917574996352',
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+14099788884',
        // the body of the text message you'd like to send
        'body' => 'Hey vishal! Good luck on the bar exam!'
    )
);

	echo "send it";
    }
}