<?php

namespace App\Controllers;

use App\Models\Pelanggan;



class RegisterController extends BaseController
{

    public function index()
    {
        $data = ['title' => 'DreamKost|Register'];
        return view('layout/header', $data)
            . view('layout/navbarGuest') . view('register/register') . view('layout/footer');
    }

    public function input()
    {
        $nama = $this->request->getPost('nama');
        $no_hp = $this->request->getPost('no_hp');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $alamat = $this->request->getPost('alamat');
        $pelangganModel = (new Pelanggan($nama, $no_hp, $email, $password, $alamat))->setPenggunaData();
        return redirect()->to('/login');
    }


    public function logout()
    {
        $session = session();
        if ($session->get('is_admin')) {
            $session->remove('admin');
            return view('login/login');
        } else {
            $session->remove('user');
            return view('login/login');
        }
    }
}
