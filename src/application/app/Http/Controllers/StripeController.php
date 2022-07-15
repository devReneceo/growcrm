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
use App\Models\Subscription;
use App\Models\User;
use App\Models\Payment;
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
    public function stripeSuccess(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRP_SECRET'));
        $session = \Stripe\Checkout\Session::retrieve($request->session_id, []);
        $payment = PaymentSession::where('session_id', $request->session_id)
            ->select('id', 'session_creatorid')
            ->get();
        foreach ($payment as $p) {
            try {
                PaymentSession::where('id', $p->id)->update([
                    'session_status' => $session->status,
                    'payment_status' => $session->payment_status,
                    'session_updated' => date(' yyyy-mm-dd'),
                ]);

                $paymentcount = Payment::where(
                    'payment_invoiceid',
                    $session->payment_intent
                )
                    ->where('payment_clientid', $p->session_creatorid)
                    ->get()
                    ->count();

                if (!$paymentcount) {
                    Payment::create([
                        'payment_creatorid' => $p->session_creatorid,
                        'payment_invoiceid' => $session->payment_intent,
                        'payment_clientid' => $p->session_creatorid,
                        'payment_amount' => $session->amount_total / 100,
                        'payment_invoiceid' => $session->payment_intent,
                        'payment_gateway' => 'stripe',
                    ]);
                }

                if ($session->payment_status == 'paid') {
                    User::where('id', $p->session_creatorid)->update([
                        'level' => 'premium',
                    ]);
                    return view('stripe/stripe', [
                        'status' => 'success',
                        'nowIsPremium' => 'yes',
                    ]);
                }
                return view('stripe/stripe', [
                    'status' => 'error',
                    'message' => 'status not paid',
                    'session' => $session,
                ]);
            } catch (\Throwable $th) {
                return view('stripe/stripe', [
                    'status' => 'error',
                    'message' => 'Error processing your Premium access.',
                    'payment_status' => $session->payment_status,
                    'payment_id' => $session->payment_intent,
                    'th' => $th,
                ]);
            }
        }
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
            'customer_email' => $request->userEmail,
            'mode' => 'payment',
            'success_url' =>
                'https://installedgrowcrm-p4fwy2ceeq-uc.a.run.app/stripeResponse?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => 'https://installedgrowcrm-p4fwy2ceeq-uc.a.run.app',
        ]);

        PaymentSession::create([
            'session_creatorid' => $request->userId,
            'session_creator_fullname' => $request->userName,
            'session_creator_email' => $request->userEmail,
            'session_amount' => $session->amount_total / 100,
            'session_subscription' => $session->subscription,
            'session_id' => $session->id,
        ]);
        $session['publickey'] = env('STRP_PUBLIC');
        echo json_encode($session);
    }

    public function createAssociateStripesession(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRP_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price' => 'price_1LKv0ELL3HZheMhNmgjCkYwM',
                    'quantity' => 1,
                ],
            ],
            'customer_email' => $request->userEmail,
            'mode' => 'subscription',
            'success_url' =>
                'https://installedgrowcrm-p4fwy2ceeq-uc.a.run.app/subscriptionSuccess?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => 'https://installedgrowcrm-p4fwy2ceeq-uc.a.run.app',
        ]);

        PaymentSession::create([
            'session_creatorid' => $request->userId,
            'session_creator_fullname' => $request->userName,
            'session_creator_email' => $request->userEmail,
            'session_amount' => $session->amount_total / 100,
            'session_subscription' => $session->subscription,
            'session_id' => $session->id,
        ]);
        $session['publickey'] = env('STRP_PUBLIC');
        echo json_encode($session);
    }

    public function subscriptionSuccess(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRP_SECRET'));
        $session = \Stripe\Checkout\Session::retrieve($request->session_id, []);
        $payment = PaymentSession::where('session_id', $request->session_id)
            ->select('id', 'session_creatorid')
            ->get();
        foreach ($payment as $p) {
            try {
                PaymentSession::where('id', $p->id)->update([
                    'session_status' => $session->status,
                    'payment_status' => $session->payment_status,
                    'session_updated' => date('yyyy-mm-dd'),
                ]);

                $paymentcount = Payment::where(
                    'payment_invoiceid',
                    $session->payment_intent
                )
                    ->where('payment_clientid', $p->session_creatorid)
                    ->get()
                    ->count();

                if (!$paymentcount) {
                    Payment::create([
                        'payment_creatorid' => $p->session_creatorid,
                        'payment_invoiceid' => $session->payment_intent,
                        'payment_clientid' => $p->session_creatorid,
                        'payment_amount' => $session->amount_total / 100,
                        'payment_invoiceid' => $session->payment_intent,
                        'payment_gateway' => 'stripe',
                        'payment_subscriptionid' => $session->subscription,
                    ]);
                }

                Subscription::create([
                    'subscription_gateway_id' => $session->subscription,
                    'subscription_clientid' => $p->session_creatorid,
                    'subscription_creatorid' => $p->session_creatorid,
                    'subscription_gateway_product' =>
                        '9dll Montly subscription',
                    'subscription_gateway_price' => '$9.00 dll',
                    'subscription_gateway_product_name' => 'Associate Leads',
                    'subscription_gateway_period' => 'Monhtly',
                    'subscription_date_started' => date('yyyy-mm-dd'),
                    'subscription_date_ended' => $session->expires_at,
                    'subscription_subtotal' => $session->amount_total / 100,
                    'subscription_final_amount' => $session->amount_total / 100,
                    'subscription_status' => $session->status,
                ]);

                if ($session->payment_status == 'paid') {
                    User::where('id', $p->session_creatorid)->update([
                        'lead_associate' => 1,
                    ]);
                    return view('register/associate', [
                        'status' => 'success',
                        'nowIsPremium' => 'yes',
                    ]);
                }
                return view('register/associate', [
                    'status' => 'error',
                    'message' => 'status not paid',
                    'session' => $session,
                ]);
            } catch (\Throwable $th) {
                return view('register/associate', [
                    'status' => 'error',
                    'message' => 'Error processing your Premium access.',
                    'payment_status' => $session->payment_status,
                    'payment_id' => $session->payment_intent,
                    'th' => $th,
                ]);
            }
        }
    }
}
