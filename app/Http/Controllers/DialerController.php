<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Rest\Client;

class DialerController extends Controller
{
    public function index(Request $request)
    {
        return view('dialer.index');
    }

    public function makePhoneCall(Request $request)
    {
        $this->call_button_message = 'Dialing ...';
        try {
            $client = new Client(
                env('TWILIO_ACCOUNT_SID'),
                env('TWILIO_AUTH_TOKEN')
            );

            try{
                $client->calls->create(
                    $request->phoneNumber,
                    env('TWILIO_NUMBER'),
                    array(
                        "url" => "http://demo.twilio.com/docs/voice.xml")
                );
                $this->call_button_message = 'Call Connected!';
            }catch(\Exception $e){
                $this->call_button_message = $e->getMessage();
            }
        } catch (ConfigurationException $e) {
            $this->call_button_message = $e->getMessage();
        }
        return response()->json(['message' => $this->call_button_message]);
    }
}
