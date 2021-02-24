<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\Business\UserDataService;
use App\Services\Models\User;

/*
 * CST-256 Database Application Programming 3
 * Vien Nguyen
 * UserAuthController class
 * Jan/22nd/20
 * This class is working as a controller to route for incomming request from clients
 * This is my own work. Reference from https://laravel.com/docs/5.0/validation to validate input
 * */

class UserAuthController extends Controller
{
    //userLogin method receives request from the client and validate input data for login feature
    public function userLogin(Request $request){
        //Validate email and password
        $request->validate(
            [
                'email'=>'required|email',
                'password'=>'required|min:8|max:20',
            ]);
        //Initiates a userDataService object
        $userDataService = new UserDataService();
        //Initiates a User object
        $user = new User();
        //Set the properties for the user object
        $user->setEmail($request->input('email'));
        $user->setPassword($request->input('password'));
        //Passing the user into the userLogin method for login validation and return login result
        if($userDataService->userLogin($user)!=0){
            return view('home');
        }else{
            return view('login');
        }
        
    }
    //userRegister method is validating new user data entry and call the register service
    public function userRegister(Request $request){
        
        //validation rules
        $request->validate(
            [
            'firstName'=>'required|min:1|max:16',
            'lastName'=>'required|min:1|max:16',
            'email'=>'required|email',
            'password'=>'required|min:8|max:20',
            ]);
        //initiates a new instance of UserDataService
        $userDataService = new UserDataService();
        //Imitiate a new user
        $user = new User();
        //Set user's properties
        $user->setFirstName($request->input('firstName'));
        $user->setLastName($request->input('lastName'));
        $user->setEmail($request->input('email'));
        $user->setPassword($request->input('password'));
        //Return the new user register result
        return $userDataService->userRegister($user);
        
        $userDataService->userRegister($user);
    }
    public function UpdateUserProfile(Request $request)
    {
        
//         // validation rules
        $request->validate([
            'firstname' => 'required|min:1|max:16',
            'lastname' => 'required|min:1|max:16',
            'dob' => 'required|min:1|max:20',
            'address' => 'required|min:1|max:100',
            'phone' => 'required|min:1|max:12',
            'email' => 'required|email',
            'career' => 'required|min:1|max:100',
            'skills' => 'required|min:1|max:100'
        ]);
        // initiates a new instance of UserDataService
        $userDataService = new UserDataService();
        // Imitiate a new user
        $user = new User();
        // Set user's properties
        $user->setFirstName($request->input('firstname'));
        $user->setLastName($request->input('lastname'));
        $user->setDOB($request->input('dob'));
        $user->setAddress($request->input('address'));
        $user->setPhone($request->input('phone'));
        $user->setEmail($request->input('email'));
        $user->setCareer($request->input('career'));
        $user->setSkills($request->input('skills'));
        // Return the new user profile result
        return $userDataService->userProfile($user);
        
        $userDataService->userProfile($user);
    }
    
    public function UserProfile()
    {
        return view('myprofile');
    }
}
