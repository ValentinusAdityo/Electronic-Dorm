<?php

namespace App\Controllers;

use App\Models\Sewa;
use App\Models\Pelanggan;


class Home extends BaseController
{
    public function index()
    {
        $data = ['title' => 'DreamKost'];

        $session = session();

        if ($session->has('admin')) {
            return view('layout/header', $data) . view('layout/navbarAdmin') . view('home/home') . view('layout/footer');
        }
        if ($session->has('user')) {
            return view('layout/header', $data) . view('layout/navbarUser') . view('home/home') . view('layout/footer');
        } else {
            return view('layout/header', $data) . view('layout/navbarGuest') . view('home/home') . view('layout/footer');
        }
    }

    public function about()
    {
        $data = ['title' => 'About DreamKost'];

        $session = session();

        if ($session->has('admin')) {
            return view('layout/header', $data) . view('layout/navbarAdmin') . view('home/about') . view('layout/footer');
        }
        if ($session->has('user')) {
            return view('layout/header', $data) . view('layout/navbarUser') . view('home/about') . view('layout/footer');
        } else {
            return view('layout/header', $data) . view('layout/navbarGuest') . view('home/about') . view('layout/footer');
        }
    }

    public function profil()
    {
        $session = session();

        $dataModel = (new Sewa(null, null, null, null, null))->cariSewa($session->get('id'));

        $data = ['title' => 'Profil DreamKost', 'list' => $dataModel];

        if ($session->has('user')) {
            return view('layout/header', $data) . view('layout/navbarUser') . view('home/profil') . view('layout/footer');
        } else {
            return view('login/login');
        }
    }

    public function reset()
    {
        $session = session();

        $dataModel = (new Pelanggan(null, null, null, null, null))->cariPelanggan($session->get('nama'));

        $data = ['title' => 'Reset Password', 'list' => $dataModel];

        if ($session->has('user')) {
            return view('layout/header', $data) . view('layout/navbarUser') . view('home/reset') . view('layout/footer');
        } else {
            return view('login/login');
        }
    }

    public function updateAkun()
    {
        $session = session();
        if ($session->has('user')) {
            $nama = $this->request->getPost('nama');
            $alamat = $this->request->getPost('alamat');
            $no_hp = $this->request->getPost('no_hp');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $updateOutput = (new Pelanggan($nama, $alamat, $no_hp, $email, $password))->updatePenggunaData($session->get('nama'));
            return redirect()->to('/profil');
        }
        return view('login/login');
    }
}
