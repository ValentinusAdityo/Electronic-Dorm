<?php

namespace App\Controllers;

use App\Models\Kamar;

class Pemesanan extends BaseController
{

    public function booking($id)
    {
        $session = session();
        $kamarModel = (new Kamar())->getKamarDataById($id);
        $data = ['title' => 'DreamKost - Booking Form'];

        $data['kamar'] = $kamarModel;

        if ($session->has('admin')) {
            return view('layout/header', $data) . view('layout/navbarAdmin')
                . view('pemesanan/booking') . view('layout/footer');
        }
        if ($session->has('user')) {
            return view('layout/header', $data) . view('layout/navbarUser')
                . view('pemesanan/booking') . view('layout/footer');
        } else {
            return view('login/login');
        }
    }
}
