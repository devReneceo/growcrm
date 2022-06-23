<?php

/** --------------------------------------------------------------------------------
 * This controller manages all the business logic for home page
 *
 * @package    Grow CRM
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Http\Controllers;
use Stripe;
use App\Models\PaymentSession;
use Illuminate\Http\Request;
class StripeController extends Controller
{
    //parent

    public function __construct()
    {
        //parent
        parent::__construct();
        //authenticated
        $this->middleware('auth');
    }
    public function index()
    {
        //, compact('page', 'payload')
        //  return view('stripe/stripe');
    }

    public function createSession(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRP_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Hit 60 Premium Access',
                        ],
                        'unit_amount' => 500,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' =>
                'https://installedgrowcrm-p4fwy2ceeq-uc.a.run.app/stripeResponse?session' .
                $request->userId,
            'cancel_url' => 'https://installedgrowcrm-p4fwy2ceeq-uc.a.run.app',
        ]);
        //$session->id
        PaymentSession::create([
            'session_creatorid' => $request->userId,
            'session_creator_fullname' => $request->userName,
            'session_creator_email' => $request->userEmail,
            'session_amount' => $session->amount_total / 100,
            'session_subscription' => $session->subscription,
            'session_id' => $session->id,
        ]);
        $session['publickey'] = env('STRP_PUBLIC');
        echo json_encode([$session, 'sessionid' => $session->id]);
    }
}
