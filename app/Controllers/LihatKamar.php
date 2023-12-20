<?php

namespace App\Controllers;

use App\Models\Kamar;
use App\Models\Sewa;

class LihatKamar extends BaseController
{
    public function showAll()
    {
        $session = session();
        $kamarModel = (new Kamar())->getAllKamarData();

        $data = [
            'list' => $kamarModel,
            'title' => 'DreamKost - Daftar Kamar'
        ];
        if ($session->has('admin')) {
            helper('form');
            return view('layout/header', $data)
                . view('layout/navbarAdmin')
                . view('home/roomsAdmin')
                . view('layout/footer');
        }
        if ($session->has('user')) {
            return view('layout/header', $data)
                . view('layout/navbarUser')
                . view('home/rooms')
                . view('layout/footer');
        } else {
            return view('layout/header', $data) . view('layout/navbarGuest') . view('home/rooms') . view('layout/footer');
        }
    }
    public function search()
    {
        $session = session();
        if (!$this->request->is('post')) {
            return view('home/rooms');
        }

        $id = $this->request->getPost(['key']);

        $kamar = (new Kamar())->getKamarDataById($id);

        $data = ['hasil' => $kamar, 'title' => 'Cari Kamar'];
        if ($session->has('admin')) {
            return view('layout/header', $data)
                . view('layout/navbarAdmin')
                . view('home/search')
                . view('layout/footer');
        }
        if ($session->has('user')) {
            return view('layout/header', $data)
                . view('layout/navbarUser')
                . view('home/search')
                . view('layout/footer');
        } else {
            return view('layout/header', $data)
                . view('layout/navbarGuest')
                . view('home/search')
                . view('layout/footer');
        }
    }
    public function listrental(){
        $session = session();
        $sewa = (new Sewa(null, null, null, null, null))->getAll();
        $data = ['sewa' => $sewa, 'title' => 'Daftar Sewa'];
        if($session->has('admin')){
            return view('layout/header', $data)
                . view('layout/navbarAdmin')
                . view('daftarSewa/daftar')
                . view('layout/footer');
        }else{
            return view('layout/header', $data)
                . view('layout/navbarAdmin')
                . view('home/home')
                . view('layout/footer');
        }
    }

    public function filterKamar(){
        $session = session();
        $kategori = $this->request->getGet('kategori');
        $kamarModel = (new Kamar())->getCategory($kategori);

        $data = [
            'list' => $kamarModel,
            'title' => 'DreamKost - Daftar Kamar'
        ];
        if ($session->has('admin')) {
            helper('form');
            return view('layout/header', $data)
                . view('layout/navbarAdmin')
                . view('home/roomsAdmin')
                . view('layout/footer');
        }
        if ($session->has('user')) {
            return view('layout/header', $data)
                . view('layout/navbarUser')
                . view('home/rooms')
                . view('layout/footer');
        } else {
            return view('layout/header', $data) . view('layout/navbarGuest') . view('home/rooms') . view('layout/footer');
        }
    }
}
