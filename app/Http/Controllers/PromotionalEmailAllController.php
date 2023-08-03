<?php

namespace App\Http\Controllers;

use App\Mail\PromotionalEmail;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PromotionalEmailAllController extends Controller
{
    public function MailPage()
    {
        return view('pages.mail-page');
    }
    

    public function sendEmail(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'content' => 'required',
        ]);

        $subject = $request->input('subject');
        $content = $request->input('content');

        $customers = Customer::all();

        foreach ($customers as $customer) {
            Mail::to($customer->email)->send(new PromotionalEmail($subject, $content));
        }

        return 'Promotional email sent to all customers successfully.';
    }
}
