<?php

namespace App\Controllers;
use App\Models\MahasiswaModel;

class MahasiswaController extends BaseController
{
	public function index()
	{
		$mhs = new MahasiswaModel();
		$data['mhs'] = $mhs->findAll();
        // var_dump($data);
        // die();
		return view('kelola-data', $data);
	}

    public function create()
    {
        return view('create-mahasiswa');
    }

    public function store()
    {
        $mhs = new MahasiswaModel();
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'nrp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            $mhs->insert([
                'nrp' => $this->request->getVar('nrp'),
                'nama' => $this->request->getVar('nama'),
                'telepon' => $this->request->getVar('telepon'),
                'alamat' => $this->request->getVar('alamat'),
                'jurusan' => $this->request->getVar('jurusan')
            ]);
            session()->setFlashdata('message', 'Tambah Data Mahasiswa Berhasil');
            return redirect()->to('/kelola-data-mahasiswa');
        }
    }
    public function update()
    {
        $mhs = new MahasiswaModel();
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'nrp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            $mhs->update($this->request->getVar('mhs_id'),[
                'nrp' => $this->request->getVar('nrp'),
                'nama' => $this->request->getVar('nama'),
                'telepon' => $this->request->getVar('telepon'),
                'alamat' => $this->request->getVar('alamat'),
                'jurusan' => $this->request->getVar('jurusan')
            ]);
            session()->setFlashdata('message', 'Edit Data Mahasiswa Berhasil');
            return redirect()->to('/kelola-data-mahasiswa');
        }
    }

    public function delete()
    {
            $mhs = new MahasiswaModel();
            $mhs->delete($this->request->getVar('mhs_id'));
            session()->setFlashdata('message', 'Hapus Data Mahasiswa Berhasil');
            return redirect()->to('/kelola-data-mahasiswa');
    }

}
