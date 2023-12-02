<?php

namespace App\Controllers;

use App\Models\Kamar;
use App\Models\Sewa;

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
        if($date_start == ""){
            $data = ['title' => 'DreamKost - Booking Form'];

            $data['kamar'] = $kamar;

            return view('layout/header', $data) . view('layout/navbarUser')
                . view('pemesanan/booking') . view('layout/footer');
        }
        if($date_end == "1 Month"){
            $total = $kamar->harga * 1;
        }if($date_end == "6 Month"){
            $total = $kamar->harga * 6;
        }if($date_end == "12 Month"){
            $total = $kamar->harga * 12;
        }if($date_end == "24 Month"){
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

    public function nota(){
        $session = session();
        $idKamar = $this->request->getPost('id_kamar');
        $tanggalAwal = $this->request->getPost('tanggal_awal');
        $masaBerlaku = $this->request->getPost('masa_berlaku');
        $biaya = $this->request->getPost('biaya');
        if($session->has('user')){
            $data = (new Sewa($biaya, $tanggalAwal, $masaBerlaku, $session->id, $idKamar))->tambahSewa();
            if($data){
                $data = ['title' => 'DreamKost'];
                return view('layout/header', $data) . view('layout/navbarUser') . view('home/home') . view('layout/footer');
            }
        }
        echo "error";
        $data = ['title' => 'DreamKost'];
        return view('layout/header', $data) . view('layout/navbarUser') . view('home/home') . view('layout/footer');
    }
}
