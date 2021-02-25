<?php
// Alex Vergara Vien Nguyen Thien Anh Le
// Milestone 
// Date: 2/24/2021
// Professor Hughes
// This is our own work
namespace App\Services\Data;

class JobHistoryDAO
{
    public function __construct()
    {}
    
    // reads all job listings
    public function readAll()
    {
        // create DB Object
        $databaseConnection = new DatabaseConnection();
        // select all job listings
        $sql_query = "SELECT * FROM job_history";
        //Get connection
        $conn = $databaseConnection->getConnection();
        //Execute the query for a result
        $result = mysqli_query($conn, $sql_query);
        $conn->close();
        return $result;
        
    }
    
    // create job listing
    public function create($jobHistory)
    {
        //Open Database connection
        $db = new DatabaseConnection();
        //Query to insert database
        $sql = "INSERT INTO job_history (title, position, dateStart, dateEnd, skills, schools, highestDegree)
                VALUES('".$jobHistory->getTitle()."'
                      ,'".$jobHistory->getPosition()."'
                      ,'".$jobHistory->getDateStart()."'
                      ,'".$jobHistory->getDateEnd()."'
                      ,'".$jobHistory->getSkills()."'
                      ,'".$jobHistory->getSchools()."'
                      ,'".$jobHistory->getHighestDegree()."')";
        // if sql stmt is executed
        if($db->getConnection()->query($sql)===true){
            return true;
        }else{
            return false;
        }
    }
    
    //update method
    public function update($obj)
    {
        // Instantiate Database connection
        $db = new DatabaseConnection();
        // get connection
        $conn = $db->getConnection();
        // prepare stmt
        $stmt =  $conn->prepare("UPDATE job_history SET title = ?, position = ?, dateStart = ?, dateEnd = ?, skills = ?, schools = ?, highestDegree = ? WHERE jobID = ?");
        // error checking for stmt
        if(!$stmt){
            echo "something wrong in the binding process. sql error perhaps?";
            exit;
        }
        
        // bind param
        $id = $obj->getJobID();
        $title = $obj->getTitle();
        $position = $obj->getPosition();
        $dateStart = $obj->getDateStart();
        $dateEnd = $obj->getDateEnd();
        $skills = $obj->getSkills();
        $schools = $obj->getSchools();
        $highestDegree = $obj->getHighestDegree();
        
        // bind
        $stmt->bind_param("sssssssi", $title, $position,$dateStart, $dateEnd, $skills, $schools, $highestDegree, $id);
        // execute SQL stmt
        $stmt->execute();
        
        // Update
        if($stmt->affected_rows > 0){
            return true;
        }
        else{
            return false;
        }
        
        
    }
    
    public function delete($userId)
    {
        $db = new DatabaseConnection();
        $sql = "DELETE FROM job_history WHERE jobID = '" . $userId . "'";
        
              
        if($db->getConnection()->query($sql)===true){
            return true;
        }else{
            return false;
        }
     //   mysqli_query($conn, $sql_query);
      //  $conn->close();
      $db->getConnection()->close();
    }
    
    public function change($userId){
        $databaseConnection = new DatabaseConnection();
        $sql_query =  "";
        
        $sql_query_status = "SELECT isDeleted FROM cst_256_users WHERE id = '".$userId."'";
        
        $conn = $databaseConnection->getConnection();
        $result = mysqli_query($conn, $sql_query_status);
        
        $status = mysqli_fetch_assoc($result);
        $isDeleted = $status['isDeleted'];
        
        if($isDeleted === '1'){
            $status = 0;
            $sql_query = "UPDATE cst_256_users SET isDeleted = '".$status."' WHERE id = '".$userId."'";
        }else{
            $status = 1;
            $sql_query = "UPDATE cst_256_users SET isDeleted = '".$status."' WHERE id = '".$userId."'";
        }
        $conn = $databaseConnection->getConnection();
        mysqli_query($conn, $sql_query);
        $conn->close();
    }
}

