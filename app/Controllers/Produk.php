<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function getData()
    {
        $client = \Config\Services::curlrequest();

        $response = $client->request('POST', 'https://recruitment.fastprint.co.id/tes/api_tes_programmer', [
            'form_params' => [
                'username' => 'tesprogrammer190623C10',
                'password' => md5('bisacoding-19-06-23'),
            ],
        ]);

        $data = json_decode($response->getBody());
        foreach ($data as $barang) {
            if (is_array($barang)) {
                foreach ($barang as $item) {
                    // var_dump($item->id_produk);
                    $this->produkModel->insert([
                        'id_produk' => $item->id_produk,
                        'nama_produk' => $item->nama_produk,
                        'harga' => $item->harga,
                        'kategori' => $item->kategori,
                        'status' => $item->status,
                    ]);
                }
            }
        }
        if ($response->getStatusCode() == 200) {
            return d($this->produkModel->findAll());
        } else {
            return "gagal mengambil data";
        }
    }

    public function index()
    {

        $produk = $this->produkModel->where(['status' => 'bisa dijual'])->findAll();

        $data = [
            'title' => 'Home',
            'produk' => $produk,
        ];

        // dd($data['produk']);
        return view('produk/index', $data);
    }

    public function create()
    {
        session();
        $data = [
            'title' => 'Tambah Data',
            'validation' => \Config\Services::validation()
        ];

        return view('produk/create', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'id_produk'     => [
                'rules' => 'required|is_unique[data_produk.id_produk]|numeric',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'is_unique' => '{field} harus unik!',
                    'numeric' => '{field} harus berupa inputan angka!'
                ]
            ],
            'nama_produk'   =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!',
                ]
            ],
            'harga'         => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'numeric' => '{field} harus berupa inputan angka!'
                ]
            ],
            'kategori'   =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!',
                ]
            ],
            'status'   =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/create')->withInput()->with('validation', $validation);
        }

        $this->produkModel->insert([
            'id_produk'     => $this->request->getVar('id_produk'),
            'nama_produk'   => $this->request->getVar('nama_produk'),
            'harga'         => $this->request->getVar('harga'),
            'kategori'      => $this->request->getVar('kategori'),
            'status'        => $this->request->getVar('status'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/');
    }

    public function delete($id_produk)
    {
        $this->produkModel->delete($id_produk);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/');
    }

    public function edit($id_produk)
    {
        $data = [
            'title' => 'Edit',
            'validation' => \Config\Services::validation(),
            'produk' => $this->produkModel->where('id_produk', $id_produk)->first()
        ];

        return view('produk/edit', $data);
    }

    public function update($id_produk)
    {
        $this->produkModel
            ->where('id_produk', $id_produk)
            ->set([
                'id_produk'     => $this->request->getVar('id_produk'),
                'nama_produk'   => $this->request->getVar('nama_produk'),
                'harga'         => $this->request->getVar('harga'),
                'kategori'      => $this->request->getVar('kategori'),
                'status'        => $this->request->getVar('status'),
            ])
            ->update();

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/');
    }
}
