<?php
namespace App\Services\Business;

use App\Services\Data\AdminManagementDAO;

/*
 * CST-256 Database Application Programming 3
 * Vien Nguyen
 * AdminBusinessDataService
 *  Jan/30/20
 * This class is working with database interacting for admin services
 */
class AdminBusinessDataService implements DataAccessInterface
{

    public function read()
    {
      $adminManagementDAO = new AdminManagementDAO();
      return $adminManagementDAO->readAll();
    }

    public function create($obj)
    {}

    public function update($obj)
    {}

    public function delete($obj)
    {
        $adminManagementDAO = new AdminManagementDAO();
        return $adminManagementDAO->delete($obj);
    }
    public function ChangeStatus($obj)
    {
        $adminManagementDAO = new AdminManagementDAO();
        return $adminManagementDAO->change($obj);
    }
    
    public function findAllJobs($obj){
        $adminManagementDAO = new AdminManagementDAO();
        return $adminManagementDAO->findAllJobs($obj);
    }
    public function update2($obj)
    {}


}

