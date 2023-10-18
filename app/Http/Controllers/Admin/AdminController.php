<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        //

        Session::put('page', 'dashboard');

        return view('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Admin $admin)
    {
        //
    }

    /**
     * Login function
     * 
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */

    public function login(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $data = $request->all();

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required|min:8',
            ];
            $customMessages = [
                'email.required' => 'Email is required',
                'email.email' => 'The email must be a valid email address.',
                'email.max' => 'The email is too long, please try a different email address.',
                'password.required' => 'Password is required',
                'password.min' => 'The password is incorrect and short.',
            ];

            $this->validate($request, $rules, $customMessages);

            if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 1]))
            {
                return redirect('/admin/dashboard');
            }
            elseif(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 0]))
            {
                return redirect('/admin/error/201')->with('error_message', 'User Disabled. Opening Dashboard with Limited Privilage.');
            }
            else
            {
                return redirect()->back()->with('error_message', 'Invalid Email or Password')->withInput($request->input());
            }
        }

        return view('admin.login');
    }

    /**
     * 
     */

    public function password(Request $request)
    {
        Session::put('page', 'passwords');

        if($request->isMethod('POST'))
        {
            $data = $request->all();

            $rules = [
                'current_password' => 'required|min:8',
                'new_password' => 'required|min:8',
                'confirm_password' => 'required|min:8',
            ];
            $customMessages = [
                'current_password.required' => 'Current password is required',
                'current_password.min' => 'The current password is incorrect and short.',
                'new_password.required' => 'New password is required',
                'new_password.min' => 'The new password is incorrect and short.',
                'confirm_password.required' => 'Confirm password is required',
                'confirm_password.min' => 'The confirm password is incorrect and short.',
            ];

            $this->validate($request, $rules, $customMessages);

            if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password))
            {
                if ($data['current_password'] == $data['new_password'])
                {
                    return redirect()->back()->with('error_message', 'New password can\'t be the same as current password');
                }
                else if ($data['new_password'] != $data['confirm_password'])
                {
                    return redirect()->back()->with('error_message', 'New password and Confirm password are not same');
                }
                else
                {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_password'])]);

                    return redirect()->back()->with('success_message', 'Password update Successful');
                }
            }
            else
            {
                return redirect()->back()->with('error_message', 'Current password is Incorrect');
            }
        }

        return view('admin.settings.admin-password');
    }

    /**
     * 
     */

    public function account(Request $request)
    {
        Session::put('page', 'accounts');

        if($request->isMethod('POST'))
        {
            $data = $request->all();

            echo "<pre>"; print_r($data);
        }

        $userDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();

        return view('admin.settings.admin-account')->with(compact('userDetails'));
    }

    /**
     * Check User Password
     *
     * @param Request $request
     * @return void
     */

    public function checkCurrentPassword(Request $request)
    {
        $data = $request->all();
 
        if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password))
        {
            echo 'True';
        }
        else
        {
            echo 'False';
        }
    }

    /**
     * Logout Functionality
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

     public function logout()
     {
         Auth::guard('admin')->logout();
 
         Session::flush();
 
         return redirect('/admin/login')->with('success_message', 'Logout Successful');
     }

}
