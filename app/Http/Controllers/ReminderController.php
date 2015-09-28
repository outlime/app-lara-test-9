<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Pheanstalk\Pheanstalk;

use Input;
use Mail;
use Session;
use Carbon\Carbon;

class ReminderController extends Controller
{
    public function setReminder()
    {
    	// Set offset (in seconds)
    	$date = Input::get('date');
    	$time = Input::get('time');

    	$dtNow = Carbon::now();
    	$dtInput = Carbon::parse($date . ' ' . $time);

    	$offset = $dtNow->diffInSeconds($dtInput, false);

    	// Set parameters
    	$address = Input::get('email');
    	$reminder = Input::get('reminder');
    	$offset = ($offset <= 0) ? 0 : $offset;

    	Mail::later($offset, 'emails.remind', compact('reminder'), function ($message) use ($address) {
    		$message->from('reminder@wansi.com', 'Wansi Reminder System');
			$message->to($address, $name = null);
		});

		Session::flash('flash_success', 'Your reminder has been set!');
		return redirect('/');
    }
}
