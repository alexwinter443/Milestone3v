<?php

namespace App\Services\Business;
use App\Services\Data\DatabaseConnection;

/*
 * CST-256 Database Application Programming 3
 * Vien Nguyen Alex V.
 * UserDataService class
 *  Jan/22nd/20
 * This class is working as database service for CRUD.
 * */
class UserDataService{
    
    //Login function. The function will open a coonnection to the database. 
    //Select a record where email and password equal to the attributes of email and password in user object.
    function userLogin($user){
        //Open connection
        $db = new DatabaseConnection();
        //Query to the database
        $sql_query = "SELECT * FROM cst_256_users WHERE  email = '".$user->getEmail()."' AND password = '".$user->getPassword()."'";
        //Get connection
        $Connection = $db->getConnection();
        //Execute the query for a result
        $result = $Connection->query($sql_query);
        //Return the result
        return $result->num_rows;
        
    }
    //user Register function.
    //Create a user record into the database using $user attributes.
    function userRegister($user){
        //Open Database connection
        $db = new DatabaseConnection();
        //Query to insert database 
        $sql = "INSERT INTO cst_256_users (firstname, lastname, email, password) 
                VALUES('".$user->getFirstName()."'
                      ,'".$user->getLastName()."'
                      ,'".$user->getEmail()."'
                      ,'".$user->getPassword()."')";
        if($db->getConnection()->query($sql)===true){
           return view('home');
        }else{
           return view('register');
        }
    }
    function adminViewProfile($user){
        //Open Database connection
        $db = new DatabaseConnection();
        //Query to the database
        $sql_query = "SELECT * FROM cst_256_users WHERE  email = '".$user->getEmail()."'";
        //Get connection
        $Connection = $db->getConnection();
        //Execute the query for a result
        $result = $Connection->query($sql_query);
        //Return the result
        return $result;
    }
    
    function userProfile($user)
    {
        // Open Database connection
        $db = new DatabaseConnection();
        // Query to insert database
        $sql = "INSERT INTO cst_256_users (firstname, lastname, dob, address, phone, email, career, skills)
                VALUES('" . $user->getFirstName() . "'
                      ,'" . $user->getLastName() . "'
                      ,'" . $user->getDOB() . "'
                      ,'" . $user->getAddress() . "'
                      ,'" . $user->getPhone() . "'
                      ,'" . $user->getEmail() . "'
                      ,'" . $user->getCareer() . "'
                      ,'" . $user->getSkills() . "')";
        if ($db->getConnection()->query($sql) === true) {
            return view('home');
        } else {
            return view('myprofile');
        }
    }
    
}
