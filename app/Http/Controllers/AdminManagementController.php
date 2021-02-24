<?php
//Vien Nguyen
//Professor Hughes
//Date: 2/6/2021
//Milestone 2
//this is my own work
namespace App\Http\Controllers;


use App\Services\Business\AdminBusinessDataService;
use Illuminate\Http\Request;

class AdminManagementController extends Controller
{
   
    public function readAllUsers(){
        
        $adminManagement = new AdminBusinessDataService();
        $data = $adminManagement->read();
        $users = Array();
        while ($row = mysqli_fetch_assoc($data)) {
           array_push($users, $row);
        }
        return view('internals/admin')->with('users',$users);
    }
    
    public function FindAllJobs(Request $request) {
        $job = "";
        $adminManagement = new AdminBusinessDataService();
        $jobListings = $adminManagement->findAllJobs($job);
        
        $allJobs = Array();
        while ($row = mysqli_fetch_assoc($jobListings)) {
            array_push($allJobs, $row);
        }
        return view('jobs')->with('jobs', $allJobs);
    }
    
    public function ChangeUserStatus(Request $request){
        $userId = $request->input('userId');
        $adminManagement = new AdminBusinessDataService();
        $adminManagement->ChangeStatus($userId);
        
        $adminManagement = new AdminBusinessDataService();
        $data = $adminManagement->read();
        $users = Array();
        while ($row = mysqli_fetch_assoc($data)) {
            array_push($users, $row);
        }
        return view('internals/admin')->with('users',$users);
    }
    
    public function DeleteUser(Request $request){
        
        $userId = $request->input('userId');
        $adminManagement = new AdminBusinessDataService();
        $adminManagement->delete($userId);
        
        $adminManagement = new AdminBusinessDataService();
        $data = $adminManagement->read();
        $users = Array();
        while ($row = mysqli_fetch_assoc($data)) {
            array_push($users, $row);
        }
        return view('internals/admin')->with('users',$users);
    }
    

}
