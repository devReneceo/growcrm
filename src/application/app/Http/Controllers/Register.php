<?php

/** --------------------------------------------------------------------------------
 * This controller manages all the business logic for reminders
 *
 * @package    Grow CRM
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Http\Controllers;
use App\Models\Words;
use App\Http\Responses\Authentication\AuthenticateResponse;
use App\Mail\ForgotPassword;
use App\Repositories\ClientRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Validator;

class Register extends Controller
{
    public function __construct()
    {
        //   parent::__construct();
    }

    public function index()
    {
        return view('register/register');
    }

    public function leadAssociate()
    {
        return view('register/associate', [
            'isLogedIn' => Auth::check(),
        ]);
    }
    public function add(Request $request)
    {
        //check if the feature is enabled
        if (config('system.settings_clients_registration') == 'disabled') {
            abort(409, __('lang.this_feature_is_unavailable'));
        }

        $messages = [];

        //validate
        $validator = Validator::make(
            request()->all(),
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'phone_number' => 'required|numeric|digits:10',
                'client_company_name' => 'required',
                'password' => 'required|confirmed|min:6',
                'email' => 'email|required|unique:users,email',
            ],
            $messages
        );

        //errors
        if ($validator->fails()) {
            $errors = $validator->errors();
            $messages = '';
            foreach ($errors->all() as $message) {
                $messages .= "<li>$message</li>";
            }

            abort(409, $messages);
        }

        //create the client
        if (!($client = $this->clientrepo->signUp())) {
            abort(409);
        }

        //create user
        if (!($user = $this->userrepo->signUp($client->client_id))) {
            abort(409);
        }

        //login the user
        $credentials = request()->only('email', 'password');
        $remember = true;
        Auth::attempt($credentials, $remember);

        /** ----------------------------------------------
         * send email to user
         * ----------------------------------------------*/
        $data = [
            'password' => request('password'),
        ];
        $mail = new \App\Mail\UserWelcome($user, $data);
        $mail->build();

        //set flass session
        request()
            ->session()
            ->flash(
                'success-notification-longer',
                __('lang.welcome_to_dashboard')
            );

        //redirect to home
        $jsondata['redirect_url'] = url('home');
        return response()->json($jsondata);
    }
}
