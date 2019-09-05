<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends AdminController
{

//     public function __construct()
// {
//     $this->middleware('auth');
// }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // $contactMail = \App\Setting::where('key','contact_mail')->get()->first();

        return view('admin.home.index');
    }

    /**
     * Update multiple settings
     *
     * @param  Request  $request
     * @return Response
     */
    public function updateSettings(Request $request)
    {
        // var_dump($request->setting); exit;
        foreach($request->setting as $key => $settingItem){

            $setting = \App\Setting::whereKey($key)->first();

            $input = [
                'value' => $settingItem
            ];

            $setting->fill($input)->save();

        }

        \Session::flash('status', 'Configurações atualizadas successfully.');

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
