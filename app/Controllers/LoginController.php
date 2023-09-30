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
            $session = session();
            $session->set('admin', $adminModel['nama']);
            $session->set('is_admin', true);
            return redirect()->to('/');
        }

        if ($pelangganModel) {
            $session = session();
            $session->set('user', $pelangganModel['nama']);
            $session->set('is_admin', false);
            return redirect()->to('/');
        } else {
            return view('login/login');
        }
        /*        $adminModel = new AdminModel();
        $pelangganModel = new PelangganModel();

        // Check if login credentials belong to an admin
        $admin = $adminModel->where('admin_id', $username)
            ->where('password', $password)
            ->first();

        // Check if login credentials belong to a pelanggan
        $pelanggan = $pelangganModel->where('pelanggan_id', $username)
            ->where('password', $password)
            ->first();

        if ($admin) {
            // Login as admin
            $session = session();
            $session->set('admin', $username);
            $session->set('is_admin', true);

            return redirect()->to('/');
        } elseif ($pelanggan) {
            // Login as pelanggan
            $session = session();
            $session->set('user', $username);
            $session->set('is_admin', false);

            return redirect()->to('/');
        } else {
            return view('login/login');
        }*/
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
