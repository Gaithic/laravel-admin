<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationValidation;
use App\Models\User;
use App\Models\Post;
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
        $posts = Post::all();
            return view('users.mainDashboard', [
                'title' => $title,
                'posts' => $posts
            ]);
        
    }

    public function adminView(){
        $title = 'Admin Dashboard';
        return view('layout.app',
        [
            'title' => $title
        ])->with('success', 'Welcome to Admin Dashboard');
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

    public function userView(){
        $title = 'Dashboard';
        $users = User::all();
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

            return redirect()->intended(route('login', compact('users')))->with('success', "Your account is created Kindly Login!");
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
        $posts  = Post::with('user')->get();
        if($user->role_id == 1){
            return view('users.admindashboard',
            [
                'title' => $title,
                'user' => $user,
                'posts' => $posts
            ])->with('success', 'Welcome to Admin Dashboard!');
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
                'user' => $user,
                'posts' => $posts
            ]);
        }else{
            return view('layout.master',
            [
                'title' => $title,
                'user' => $user,
                'posts' => $posts
            ]);
        }
    }

}
