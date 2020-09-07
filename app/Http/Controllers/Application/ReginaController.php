<?php

namespace App\Http\Controllers\Application;

use Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\DataTables\UserDataTable;
use App\Models\Regina;
use View;
use Validator;
use Redirect;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;

class ReginaController extends Controller
{

    public function showLogin()
    {
        return view('admin.forms.reginaMaster');
    }

    public function doLogin(Regina $regina, Request $request)
    {
        // validate the info, create rules for the inputs
        $rules=array(
            'email' => 'required|email',
            'password' => 'required|alpha_num|min:3'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(\Request::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('loginReginas')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Request::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {
            // create our user data for the authentication

            $email = Request::get('email');
            $password = Request::get('password');

            $hashedPassword = Regina::where('email', $email)->first();

            if (Hash::check($password, optional ($hashedPassword)->password))
            {
                return Redirect::to('item');
            } else {
                // validation not successful, send back to form
                return Redirect::to('loginReginas');
            }
        }
    }

    //logout
    public function destroy(Regina $regina)
    {
        $regina=Regina::all()->first();
        auth()->id();
        if ($regina->id !== Auth::regina($id)->regina()->id) {
            return $this->destroyFlashRedirect($regina);
        }
        return $this->redirectRoutePath('index', 'admin.delete.self');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ReginaDataTable $dataTable)
    {
        return $dataTable->render('admin.forms.reginaMaster', ['link' => route('admin.regina.create')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $regina= Regina::all();
        return view('admin.forms.reginaMaster', ['reginas' => $regina]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->createFlashRedirect(Regina::class, $request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Regina $regina)
    {
        return view('admin.forms.reginaMaster', ['object' => $regina]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Regina $regina)
    {
        return view('admin.forms.reginaMaster', $this->formVariables('regina', $regina));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Regina $regina, Request $request)
    {
        return $this->saveFlashRedirect($regina, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
