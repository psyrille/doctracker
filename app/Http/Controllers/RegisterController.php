<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_role; // Don't forget to import the User_role model if you haven't already
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request) 
    {
        // return $request->type;
        $user = User::create($request->validated());

        if ($user) {
            $saveUser_role = new User_role;
            $saveUser_role->userid = $user->id;
            $saveUser_role->roleid = $request->type;
            if ($request->type == 0) {
                $saveUser_role->role_name = "Admin";
            } elseif ($request->type == 2) {
                $saveUser_role->role_name = "User";
            }

            if ($saveUser_role->save()) {
                return redirect()->back()->with('success', 'New user has been created successfully.');
            }
        }

        return redirect()->back()->withErrors('Error', 'Something went wrong while creating the user.');
    }
}
