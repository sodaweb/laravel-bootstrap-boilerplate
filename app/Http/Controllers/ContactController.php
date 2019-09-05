<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    /**
     * Display the contact page.
     *
     * @return Response
     */
    public function index()
    {
        return view('contact.index');
    }


	/**
     * Email the contact request
     *
     * @param Request $request
     * @return Redirect
     */
    public function contact(Request $request)
    {
        $result2 = $request->validate([
			'name' => 'required',
			'email' => 'required|email',
			'phone' => 'required',
			// 'message' => 'required',
			'g-recaptcha-response' => 'required|captcha',
		]);



		$data = $request->only('name', 'email', 'phone', 'message');
		$result = true;
		try {
			Mail::to("ghpk88@gmail.com")->send(new MessageReceived($data));
		} catch (\Exception $e) {
			\Log::error($e->getMessage());
			$result = false;
		}

		if($result){
			return redirect()->back()->with('status', 'Mensagem enviada successfully.');
		}
		else{
			return redirect()->back()->withErrors('Erro ao enviar mensagem. Tente novamente mais tarde.');
		}

    }	

}