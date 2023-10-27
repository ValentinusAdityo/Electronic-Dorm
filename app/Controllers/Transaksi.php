<?php

namespace App\Controllers;

use App\Models\Kamar;

class Transaksi extends BaseController
{
    public function pembayaran()
    {
        $session = session();

        $date_start = $this->request->getPost('booking-date');
        $date_end = $this->request->getPost('booking-roomdate');
        $room_data = $this->request->getPost('room_data');

        if ($session->has('user')) {

            $data = ['title' => 'DreamKost|Pembayaran'];
            return view('layout/header', $data)
                . view('layout/navbarUser')
                . view('pembayaran/pembayaran')
                . view('layout/footer');
        } else {
            return redirect()->to('/');
        }
    }

    public function konfirmasiPembayaran()
    {
        $session = session();
        if ($session->has('admin')) {
            $data = ['title' => 'Konfirmasi Pembayaran'];
            return view('layout/header', $data)
                . view('layout/navbaradmin')
                . view('pembayaran/konfirmasiPembayaran')
                . view('layout/footer');
        } else {
            return redirect()->to('/');
        }
    }
}
