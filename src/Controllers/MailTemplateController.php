<?php

namespace Grundmanis\Laracms\Modules\MailTemplate\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Grundmanis\Laracms\Modules\MailTemplate\Models\LaracmsMailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MailTemplateController extends Controller
{

    /**
     * @var User
     */
    private $user;

    /**
     * @var LaracmsMailTemplate
     */
    private $template;

    /**
     * NewsletterController constructor.
     * @param User $user
     * @param LaracmsMailTemplate $template
     */
    public function __construct(User $user, LaracmsMailTemplate $template)
    {
        $this->user = $user;
        $this->template = $template;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('laracms.mail-template::index', [
            'templates' => $this->template->paginate(20)
        ]);
    }

    public function create()
    {
        return view('laracms.mail-template::form');
    }

    public function store(Request $request)
    {
        $icon = time().'.'.$request->icon->getClientOriginalExtension();
        $request->icon->move(public_path('uploads/icons'), $icon);

        $data = $request->all();
        $data['icon'] = 'uploads/icons/' . $icon;

        $this->template->create($data);

        return redirect()
            ->route('laracms.mail-template')
            ->with('status', 'Template created!');
    }

    public function edit(LaracmsMailTemplate $template)
    {
        return view('laracms.mail-template::form', compact('template'));
    }


    public function update(Request $request, LaracmsMailTemplate $template)
    {
        $data = $request->all();
        if ($request->icon) {

            try {
                File::delete(public_path($template->icon));
            } catch (\Exception $exception) {
                //
            }

            $icon = time().'.'.$request->icon->getClientOriginalExtension();
            $request->icon->move(public_path('uploads/icons'), $icon);
            $data['icon'] = 'uploads/icons/' . $icon;
        }

        $template->update($data);

        return redirect()->back()->with('status', trans('texts.success'));
    }


    public function destroy(LaracmsMailTemplate $template)
    {
        try {
            File::delete(public_path($template->icon));
        } catch (\Exception $exception) {
            //
        }

        $template->delete();

        return redirect()
            ->route('laracms.mail-template')
            ->with('status', 'Mail Tempalte deleted!');
    }
}