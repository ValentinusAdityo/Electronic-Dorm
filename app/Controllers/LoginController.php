<?php

namespace App\Controllers;

use App\Models\Admin;
use App\Models\Pelanggan;

class LoginController extends BaseController
{

    public function index()
    {
        return view('login/login');
    }

    public function check()
    {
        $data = ['title' => 'EuforiaHome'];

        /** @var string */
        $user = $this->request->getPost('usr');
        $password = $this->request->getPost('pwd');

        if (preg_match('/^[0-9]+$/', $user)) {
            $adminModel = (new Admin(null, $user, $password))->getAdminData();
            $pelangganModel = (new Pelanggan(null, $user, null, $password, null))->getPenggunaData();
        } else if (filter_var($user, FILTER_VALIDATE_EMAIL)) {
            $pelangganModel = (new Pelanggan(null, null, $user, $password, null))->getPenggunaData();
        } else if (preg_match('/^[a-zA-Z\s]+$/', $user)) {
            $adminModel = (new Admin($user, null, $password))->getAdminData();
            $pelangganModel = (new Pelanggan($user, null, null, $password, null))->getPenggunaData();
        }

        if ($adminModel) {
            $dataAdmin = [
                'id' => $adminModel['id'],
                'admin' => $adminModel['nama'],
                'is_admin' => true
            ];
            $session = session();
            $session->set($dataAdmin);
            return redirect()->to('/');
        }

        if ($pelangganModel) {
            $dataUser = [
                'id' => $pelangganModel['id'],
                'user' => $pelangganModel['nama'],
                'is_admin' => false
            ];
            $session = session();
            $session->set($dataUser);
            return redirect()->to('/');
        } else {
            return view('login/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('admin');
        $session->remove('user');
        $session->set('is_admin', false);

        return view('login/login');
    }
}
