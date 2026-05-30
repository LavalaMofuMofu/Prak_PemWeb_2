<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    public function getProfilData()
    {
        return [
            'nama'     => 'Muhammad Irgi Fahrezha', 
            'nim'      => '2410817210005', 
            'prodi'    => 'Teknologi Informasi',
            'hobi'     => ['Bermain Game', 'Mendengar Musik','Menonton Film','Traveling'],
            'skill'    => ['HTML5', 'JavaScript', 'PHP', 'Tailwind CSS'],
            'tambahan' => 'Saya adalah mahasiswa aktif program studi Teknologi Informasi yang memiliki ketertarikan tinggi mendalam di bidang rekayasa perangkat lunak dan arsitektur database.',
            'foto'     => base_url('Profile_Picture/PP_Alice.jpg')
        ];
    }
}