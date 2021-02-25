<?php
namespace App\Services\Business;

use App\Services\Data\JobHistoryDAO;
use App\Services\Data\DatabaseConnection;

/*
 * CST-256 Database Application Programming 3
 * Vien Nguyen - Anh Le
 * AdminBusinessDataService
 *  Jan/30/20
 * This class is working with database interacting for admin services
 */
class JobHistoryService implements DataAccessInterface
{
    
    // reads all jobs
    public function read()
    {
        // return job DAO method
        $jobHistoryDAO = new JobHistoryDAO();
        return $jobHistoryDAO->readAll();
    }
    
    // create job portfolio
    public function create($jobHistory)
    {
        // return DAO method
       $createNew = new JobHistoryDAO();
       $isInserted = $createNew->create($jobHistory);
       return $isInserted;
    }
    
    public function update($obj)
    {
        
    }
    
    // delete method
    public function delete($userId)
    {
        $jobDao = new JobHistoryDAO();
        $isDeleted = $jobDao->delete($userId);
        return $isDeleted;
    }
    
    public function ChangeStatus($obj)
    {
        
    }
    
    // update job listing
    public function update2($obj)
    {
        
        $jobHistoryDAO = new JobHistoryDAO();
        $stmt = $jobHistoryDAO->update($obj);
        return $stmt;
        
    }

    
}

