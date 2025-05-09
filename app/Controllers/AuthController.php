<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class AuthController extends ResourceController
{
   public function showRegisterForm()
{
    return view('register');
}

public function showLoginForm()
{
    return view('login');
}

public function saveRegister()
{
    $userModel = new \App\Models\UserModel();

    $data = [
        'email' => $this->request->getPost('email'),
        'username' => $this->request->getPost('username'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
    ];

    $userModel->insert($data);
    return redirect()->to('/auth/login');
}

public function doLogin()
{
    helper(['jwt']);
    $userModel = new \App\Models\UserModel();

    $username = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $user = $userModel->where('email', $username)->first();

    if ($user && password_verify($password, $user['password'])) {
        $token = getJWT(['id' => $user['id'], 'username' => $user['username'],'email' => $user['email']]);
        return $this->response->setJSON(['token' => $token]);
    }

    //return redirect()->back()->withInput()->with('error', 'Invalid email or password.');
    return $this->failUnauthorized('Invalid credentials');
}



}
