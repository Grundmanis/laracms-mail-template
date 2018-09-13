<?php

namespace Grundmanis\Laracms\Modules\MailTemplate\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Grundmanis\Laracms\Modules\Newsletter\Mail\MailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailTemplateController extends Controller
{

    /**
     * @var User
     */
    private $user;

    /**
     * NewsletterController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('laracms.newsletter::index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function send(Request $request)
    {
        $users = $this->user->where('seller', $request->to == 'sellers')->get()->pluck('email');

        Mail::to($users)->send(new MailTemplate($request->message, $request->subject));

        return redirect()->back()->with('status', 'E-mail was sent!');
    }
}