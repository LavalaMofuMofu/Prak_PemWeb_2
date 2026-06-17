<?php
namespace App\Controllers;
use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        $data['buku'] = $this->bukuModel->findAll();
        return view('buku/index', $data);
    }

    public function create()
    {
        session();
        $data = ['validation' => \Config\Services::validation()];
        return view('buku/create', $data);
    }

    public function store()
    {
        $rules = [
            'judul' => [
                'rules' => 'required|string', 
                'errors' => ['required' => 'Judul harus diisi.', 'string' => 'Judul harus berupa string.'] // 
            ],
            'penulis' => [
                'rules' => 'required|string', 
                'errors' => ['required' => 'Penulis harus diisi.', 'string' => 'Penulis harus berupa string.'] // 
            ],
            'penerbit' => [
                'rules' => 'required|string', 
                'errors' => ['required' => 'Penerbit harus diisi.', 'string' => 'Penerbit harus berupa string.'] // 
            ],
            'tahun_terbit' => [
                'rules' => 'required|integer|greater_than[1800]|less_than[2024]', 
                'errors' => [
                    'required' => 'Tahun terbit harus diisi.',
                    'integer' => 'Tahun terbit harus berupa angka.',
                    'greater_than' => 'Tahun terbit harus lebih besar dari 1800.', 
                    'less_than' => 'Tahun terbit harus lebih kecil dari 2024.' 
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/buku/create')->withInput()->with('errors', $this->validator->getErrors());        
        }

        $this->bukuModel->save([
            'judul' => $this->request->getVar('judul'),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
        ]);

        return redirect()->to('/buku');
    }

    public function delete($id)
    {
        $this->bukuModel->delete($id);
        return redirect()->to('/buku');
    }

    public function edit($id)
    {
        session();
        $data = [
            'validation' => \Config\Services::validation(),
            'buku' => $this->bukuModel->find($id) 
        ];
        return view('buku/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'judul' => [
                'rules' => 'required|string', 
                'errors' => ['required' => 'Judul harus diisi.', 'string' => 'Judul harus berupa string.'] 
            ],
            'penulis' => [
                'rules' => 'required|string', 
                'errors' => ['required' => 'Penulis harus diisi.', 'string' => 'Penulis harus berupa string.'] 
            ],
            'penerbit' => [
                'rules' => 'required|string', 
                'errors' => ['required' => 'Penerbit harus diisi.', 'string' => 'Penerbit harus berupa string.'] 
            ],
            'tahun_terbit' => [
                'rules' => 'required|integer|greater_than[1800]|less_than[2024]', 
                'errors' => [
                    'required' => 'Tahun terbit harus diisi.',
                    'integer' => 'Tahun terbit harus berupa angka.',
                    'greater_than' => 'Tahun terbit harus lebih besar dari 1800.', 
                    'less_than' => 'Tahun terbit harus lebih kecil dari 2024.' 
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/buku/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->bukuModel->update($id, [
            'judul' => $this->request->getVar('judul'),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
        ]);

        return redirect()->to('/buku');
    }
}