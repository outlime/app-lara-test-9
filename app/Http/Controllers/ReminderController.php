<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Pheanstalk\Pheanstalk;
use App\Http\Requests\PostRequest;

use Input;
use Mail;
use Session;
use Carbon\Carbon;

class ReminderController extends Controller
{
    public function setReminder(PostRequest $request)
    {
        $request->all();

    	// Set offset (in seconds)
    	$date = Input::get('date');
    	$time = Input::get('time');

    	$dtNow = Carbon::now();
    	$dtInput = Carbon::parse($date . ' ' . $time);

    	$offset = $dtNow->diffInSeconds($dtInput, false);

    	// Set parameters
    	$address = Input::get('email');
    	$reminder = Input::get('reminder');

        if ($offset <= 0) {
            Session::flash('flash_danger', 'Please set a future time.');
            return redirect('/');
        }

    	Mail::later($offset, 'emails.remind', compact('reminder'), function ($message) use ($address) {
    		$message->from(env('FROM_EMAIL'), env('FROM_NAME'));
			$message->to($address, $name = null);
		});

		Session::flash('flash_success', 'Your reminder has been set!');
		return redirect('/');
    }
}
