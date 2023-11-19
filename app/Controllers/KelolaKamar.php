<?php

namespace App\Controllers;

use App\Models\Kamar;

class KelolaKamar extends BaseController
{
    public function input()
    {
        $session = session();
        if ($session->has('admin')) {
            $fasilitas = $this->request->getPost('fasilitas');
            $harga = $this->request->getPost('harga');
            $deskripsi = $this->request->getPost('deskripsi');
            $namaKamar = $this->request->getPost('namaKamar');

            $img = $this->request->getFile('gambar');
            if (!$img->hasMoved()) {

                $publicPath = 'uploads/';

                $filePath = FCPATH . $publicPath;
                $newName = $img->getRandomName();
                $img->move($filePath, $newName);

                (new Kamar($namaKamar, $fasilitas, $harga, $deskripsi, 0, $newName))->setKamarData();
                return redirect()->to('/rooms');
            }
        } else {
            return view('login/login');
        }
    }

    public function updateView()
    {
        $session = session();
        if ($session->has('admin')) {
            helper('form');
            $kamarModel = (new Kamar())->getKamarDataById($this->request->getGet('dataId'));
            if (!$this->request->is('post')) {
                return view('layout/header', ['title' => 'Ubah Kamar', 'list' => $kamarModel])
                    . view('layout/navbarAdmin')
                    . view('kelola/update')
                    . view('layout/footer');
            }
        }
        return view('login/login');
    }

    public function update(){
        $session = session();
        if($session->has('admin')){
            $fasilitas = $this->request->getPost('fasilitas');
            $harga = $this->request->getPost('harga');
            $deskripsi = $this->request->getPost('deskripsi');
            $namaKamar = $this->request->getPost('namaKamar');

            $img = $this->request->getFile('gambar');
            if (!$img->hasMoved()) {

                $publicPath = 'uploads/';

                $filePath = FCPATH . $publicPath;
                $newName = $img->getRandomName();
                $img->move($filePath, $newName);

                $updateOutput = (new Kamar($namaKamar, $fasilitas, $harga, $deskripsi, 0, $newName))->updateKamarData($this->request->getPost('idKamar'));
                return redirect()->to('/rooms');
            }
        }
        return view('login/login');
    }

    public function delete($id)
    {
        $session = session();
        (new Kamar())->deleteKamarData($id);
        if ($session->has('admin')) {
            $kamarModel = (new Kamar())->getAllKamarData();
            $data = [
                'list' => $kamarModel,
                'title' => 'DreamKost - Rooms List View'
            ];
            return redirect()->to('rooms');
        } else {
            return view('login/login');
        }
    }
}
