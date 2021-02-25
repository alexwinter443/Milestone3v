<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\Business\JobHistoryService;
use App\Services\Models\JobHistoryModel;

/*
 * CST-256 Database Application Programming 3
 * Vien Nguyen - Anh Le
 * JobHistoryController class
 * Feb 21st 2021
 * This class is working as a controller to route for incomming request from clients
 * 
 * */

class JobHistoryController extends Controller
{
    // Anh
    //userLogin method receives request from the client and validate input data for login feature
    public function jobHistory(Request $request){
        //Validate email and password
        $request->validate(
            [
                'title'=>'required',
                'position'=>'required',
                'dateStart'=>'required',
                'dateEnd'=>'required',
                'skills'=>'required',
                'schools'=>'required',
                'highestDegree'=>'required',
            ]);
        //Initiates a userDataService object
        $jobHistoryService = new JobHistoryService();
        //Initiates a User object
        $job = new JobHistoryModel();
        //Set the properties for the user object
        $job->setTitle($request->input('title'));
        $job->setPosition($request->input('position'));
        $job->setDateStart($request->input('dateStart'));
        $job->setDateEnd($request->input('dateEnd'));
        $job->setSkills($request->input('skills'));
        $job->setSchools($request->input('schools'));
        $job->setHighestDegree($request->input('highestDegree'));
        //Return the new job history porfolio result
        $isInsertedSuccess= $jobHistoryService->create($job);
        if($isInsertedSuccess){
            $jobHistoryDataSerivce = new JobHistoryService();
            $data = $jobHistoryDataSerivce->read();
            
            $JobHistoryModels = Array();
            while ($row = mysqli_fetch_assoc($data)) {
                array_push($JobHistoryModels, $row);
            }
            return view('ReadAllJobs')->with('JobHistoryModels',$JobHistoryModels);
        }else{
            return view('jobhistory');
        }
        
    }
    
    // read all job listings
    public function readAllJobHistory(){
        // service job
        $jobHistoryDataSerivce = new JobHistoryService();
        $data = $jobHistoryDataSerivce->read();
        // array for all job listings
        $JobHistoryModels = Array();
        while ($row = mysqli_fetch_assoc($data)) {
            array_push($JobHistoryModels, $row);
        }
        return view('ReadAllJobs')->with('JobHistoryModels',$JobHistoryModels);
    }
    
    // displays job fields 
    public function updateJob(Request $request){
        
        //$jobHistoryDataService = new JobHistoryService();
        $job = new JobHistoryModel();
        
        //$data = $jobHistoryDataService->update($job);
        // assign job iD to request from Read All Jobs view
        $job->setJobID($request->input('jobID'));
        $job->setTitle($request->input('title'));
        $job->setPosition($request->input('position'));
        $job->setDateStart($request->input('dateStart'));
        $job->setDateEnd($request->input('dateEnd'));
        $job->setSkills($request->input('skills'));
        $job->setSchools($request->input('schools'));
        $job->setHighestDegree($request->input('highestDegree'));
        // add a piece of data to view
        return view('updateJob')->with('job', $job);
    }
    
    // Update job
    public function updateJobSave(Request $request){
        
        $jobHistoryDataService = new JobHistoryService();
        $job = new JobHistoryModel();
        
        $job->setJobID($request->input('jobID'));
        $job->setTitle($request->input('title'));
        $job->setPosition($request->input('position'));
        $job->setDateStart($request->input('dateStart'));
        $job->setDateEnd($request->input('dateEnd'));
        $job->setSkills($request->input('skills'));
        $job->setSchools($request->input('schools'));
        $job->setHighestDegree($request->input('highestDegree'));
        
        $isUpdated = $jobHistoryDataService->update2($job);
        
        if($isUpdated){ 
            $jobHistoryDataSerivce = new JobHistoryService();
            $data = $jobHistoryDataSerivce->read();
            
            $JobHistoryModels = Array();
            while ($row = mysqli_fetch_assoc($data)) {
                array_push($JobHistoryModels, $row);
            }
            return view('ReadAllJobs')->with('JobHistoryModels',$JobHistoryModels);
            //return view('ReadAllJobs')->with('job', $job);
        }
        else{
            echo "unable to update job listing";
        }
    }
    
    public function delete(Request $request){
        
        $JobService = new JobHistoryService();
        //$job = new JobHistoryModel();
        
        $jobID = $request->input('jobID');
        
        $isDeleted = $JobService->delete($jobID);
        
        if($isDeleted){
            $jobHistoryDataSerivce = new JobHistoryService();
            $data = $jobHistoryDataSerivce->read();
            
            $JobHistoryModels = Array();
            while ($row = mysqli_fetch_assoc($data)) {
                array_push($JobHistoryModels, $row);
            }
            return view('ReadAllJobs')->with('JobHistoryModels',$JobHistoryModels);
            
        }
        else{
            echo "unable to delete . Check php code";
        }
        
    }
    
    public function ChangeUserStatus(Request $request){
        $userId = $request->input('jobID');
        $adminManagement = new JobHistoryService();
        $adminManagement->ChangeStatus($userId);
        
        //$adminManagement = new AdminBusinessDataService();
        $data = $adminManagement->read();
        $users = Array();
        while ($row = mysqli_fetch_assoc($data)) {
            array_push($users, $row);
        }
        return view('internals/admin')->with('users',$users);
    }
}