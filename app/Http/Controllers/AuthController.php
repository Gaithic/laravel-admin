<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PDO;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Symfony\Component\Console\Input\Input;
use App\Http\Requests\ValidationFactory;
use Illuminate\Contracts\Session\Session;
use PhpParser\Node\Stmt\Else_;

use function PHPUnit\Framework\returnSelf;

class AuthController extends Controller
{


    public function mainIndex(){
        $title = 'To See All  Your Posts Here';
        return view('layout.master', [
            'title' => $title
        ]);
    }

    public function adminView(){
        $title = 'Admin Dashboard';
        return view('layout.app', 
        [
            'title' => $title
        ])->with('success', 'Welcome to Admin Dashboard');
    }



    public function adminDashboard(){
        $title = 'Admin Dashboard';
        return view('users.admindashboard',
        [
            'title' => $title

        ])->with('success', 'Ypu are logged in!');
    }

    /**
     * funciton to view user register page
     * @return view
     */
    public function userRegisterView(){
        $title = 'Registration Page';
        return view('auth.register', 
        [
            'title' => $title
        ]);
    }

    public function login(){
        $title = "Login Page";
        return view('auth.login',[
            'title' => $title
        ]);

    }

    public function userDashboard(Request $request){
        $title = 'Dashboard';
        $users = User::all();
        // if (Auth::user()->role_id == 1) {
        //     return view('layout.app', 
        //     [
        //         'title' => $title,
        //         'users' => $users
        //     ])->with('success', 'You Have logged in!');
        // }elseif(Auth::check($request->role_id== 3)){
        //     return view('layout.master',
        //     [
        //         'title'  => $title,
        //         'users'  => $users
        //     ])->with('success', 'You Have logged in!');
        // }
        
        
    }

    public function userView(){
        $title = 'Dashboard';
        $users = User::all();
        // return redirect()->intended('/user-index')
        return view('users.userdashboard',
        [
            'title' => $title,
            'users' => $users

        ]);
    }




/************************************************************************************************************/
    // Logical area abov only view functions 
/************************************************************************************************************/
    

    /**
     * function to register user in db
     * and @return view of login after 
     * save() user form data
     */

    public function userRegister(RegistrationValidation $request){
        $users = new User();
        $users->username = $request->username;
        $users->email = $request->email;
        $users->contact = $request->contact;
        $users->password = Hash::make($request->password);
        $users->role_id = 3;
        $res = $users->save();
        if($res){

            return redirect()->intended(route('/loginView', compact('users')))->with('success', "Your account is created Kindly Login!");
        }else{
            return redirect()->intended(route('/registerView'))->with('error', 'Oops something Went Wrong!');
        }
       

        
    }

    /**
     * get credential for user
     * create function for that
     * @return  useremail , passwrd
     */

  


    public function userLogin(LoginRequest $request){
        /**
         * first get credentials form above function 
         * or getCredentials function
        */

        if(Auth::attempt(
            [
                'email' =>$request->email,
                'password' => $request->password
            ]
            )){
                if(Auth::check()){
                    return redirect()->intended(route('auth.dashboard'))->with('success', "You Have logged In!");
                }
               
                
                
            }else{
                return redirect()->intended(route('login'))->with('error', 'Kindly register Email First!');
            }


    }

    /**
     * funciton to logout user
     */

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->intended(route('/'))->with('success', 'You have been logged out!');
        
    }


    public function dashboard(){
        $title = "Dashboard";
        $user = Auth::user();
        if($user->role_id == 1){
            return view('users.admindashboard',
            [
                'title' => $title,
                'user' => $user
            ])->with('succes', 'Welcome to Admin Dashboard!');
        }
        elseif($user->role_id == 2){
            return view('users.managerdashboard',
            [
                'title' => $title,
                'user' => $user
            ])->with('success', 'Welcome to Manager Dashboard');
        }
        elseif($user->role_id==3){
            return view('users.userdashboard',
            [
                'title' => $title,
                'user' => $user
            ]);
        }else{
            return view('layout.master',
            [
                'title' => $title,
                'user' => $user
            ]);
        }
    }

}