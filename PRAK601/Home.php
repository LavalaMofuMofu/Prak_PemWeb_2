<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Home extends BaseController
{
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index(): string
    {
        $dataMahasiswa = $this->mahasiswaModel->getProfilData();

        $data = [
            'title' => 'Beranda - PRAK601',
            'nama'  => $dataMahasiswa['nama'],
            'nim'   => $dataMahasiswa['nim']
        ];

        return view('templates/header', $data)
            . view('beranda', $data)
            . view('templates/footer', $data);
    }

    public function profil(): string
    {
        $profilData = $this->mahasiswaModel->getProfilData();

        $data = array_merge($profilData, [
            'title' => 'Profil Praktikan - PRAK601'
        ]);

        return view('templates/header', $data)
            . view('profil', $data)
            . view('templates/footer', $data);
    }
}