<?php

namespace App\Controllers;

use App\Models\Kamar;

class KelolaKamar extends BaseController
{
    public function input()
    {
        $session = session();
        if ($session->has('admin')) {
            helper('form');
            // Memeriksa apakah melakukan submit data atau tidak.
            if (!$this->request->is('post')) {
                return view('layout/header', ['title' => 'Tambah Kamar']) . view('layout/navbarAdmin')
                    . view('kelola/input')
                    . view("layout/footer");
            }

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

    public function update()
    {
        $session = session();

        if ($session->has('admin')) {
            helper('form');

            if (!$this->request->is('post')) {
                return view('layout/header', ['title' => 'Ubah Kamar'])
                    . view('layout/navbarAdmin')
                    . view('kelola/update')
                    . view("layout/footer");
            }

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

                (new Kamar($namaKamar, $fasilitas, $harga, $deskripsi, 0, $newName))->updateKamarData($this->request->getPost('idKamar'));
                return redirect()->to('/rooms');
            }
        } else {
            return view('login/login');
        }
    }

    public function delete()
    {
        $session = session();
        if ($session->has('admin')) {
            if (!$this->request->is('post')) {
                return view('layout/header', ['title' => 'Hapus Kamar'])
                    . view('layout/navbarAdmin')
                    . view('kelola/delete')
                    . view('layout/footer');
            }
            (new Kamar())->deleteKamarData($this->request->getPost());
            return redirect()->to('/rooms');
        } else {
            return view('login/login');
        }
    }
}
