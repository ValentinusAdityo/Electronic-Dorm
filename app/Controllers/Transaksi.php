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
        $room_id = $this->request->getPost('room_data');
        $total = 0;
        $kamar = (new Kamar())->getKamarDataById($room_id);
        if($date_end == "1 Month"){
            $total = $kamar->harga * 1;
        }if($date_end == "6 Month"){
            $total = $kamar->harga * 6;
        }if($date_end == "1 Year"){
            $total = $kamar->harga * 12;
        }if($date_end == "2 Year"){
            $total = $kamar->harga * 24;
        }
        if ($session->has('user')) {

            $data = ['title' => 'DreamKost|Pembayaran',
                        'date_start' => $date_start,
                        'date_end' => $date_end,
                        'room_data' => $kamar,
                        'total' => $total];
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
