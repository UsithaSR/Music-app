<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Helpers\OneSignalPush;

use Illuminate\Http\Request;

class PushNotificationController extends Controller
{
    public function create()
    {
            return view('backend.pages.push_notifications.create');

    }

    public function store(Request $request)
    {
        try {
            $message = $request->input("message");

            OneSignalPush::sendPushNotification($message, null, 0, null, null);

            return redirect()->route('backend.push_notifications.create')->with(session()->flash('success', 'Notification Created!'));
        } catch (\Exception $e) {
            report($e);
            return redirect()->route('backend.push_notifications.create')->with(session()->flash('error', 'Something went wrong!'));
        }
    }
}
