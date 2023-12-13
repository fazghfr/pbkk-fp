<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\AuthModel;
use App\Controllers\BaseController;

class EmployeeController extends BaseController
{
    public function index()
    {
        $userModel = new User();
        $dataUser = $userModel->select('id, username, created_at')->findAll();

        $userDataModel = new AuthModel();
        $datauserEmail = $userDataModel->select('user_id, secret, username, users.created_at')
            ->join('users', 'users.id = auth_identities.user_id')
            ->findAll();
        

        $data = [
            'datas' => $datauserEmail, 
        ];

        return view('employee/viewAll', $data);
    }

    public function delete($id)
    {
        $userModel = new User();
        $userModel->delete($id);

        return redirect()->to('/employees');
    }
}
