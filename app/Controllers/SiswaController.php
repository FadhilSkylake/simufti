<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use App\Models\UsersModel;

class SiswaController extends BaseController
{
    protected $siswaModel;
    protected $userModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->userModel = new UsersModel();
        if (session('id_siswa')) {
            return redirect()->back();
        }
    }

    public function index()
    {
        $data = [
            'siswa' => $this->siswaModel->getSiswa()
        ];
        return view('siswa/index', $data);
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('siswa/create', $data);
    }

    public function detail($slug)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'siswa' => $this->siswaModel->getDetailSiswa($slug),
        ];

        //jika data enggak ada
        if (empty($data['siswa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('siswa'   . $slug .  ' tidak ditemukan.');
        }

        return view('siswa/detail', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'valid_email' => '{field} ini bukan e-mail.'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'nama_siswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'nisn' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'ttl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'status_kel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'alamat_siswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'sekolah_asal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'tgl_diterima' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'ayah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'alamat_ortu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'no_tel_rumah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'pekerjaan_ayah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'pekerjaan_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'nama_wali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'alamat_wali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'no_wali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'pekerjaan_wali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'foto_siswa' => [
                'rules' => 'is_image[foto_siswa]|mime_in[foto_siswa,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    // 'max_size' => 'ukuran nya kegedean',
                    'is_image' => 'yang kamu pilih bukan gambar',
                    'mime_in' => 'yang kamu pilih bukan gambar',
                    'required' => '{field} harus di isi.'
                ]
            ]
        ])) {
            return redirect()->to('/siswa/create')->withInput();
        }

        //ambil gambar
        $fileFoto = $this->request->getFile('foto_siswa');

        //jika gaada gambar yang di upload
        if ($fileFoto->getError() == 4) {
            $namaFoto = '../img/default/default.svg';
        } else {

            //generate nama sampul random
            $namaFoto = $fileFoto->getRandomName();

            //pindahkan file gem img
            $fileFoto->move('img', $namaFoto);
        }
        // dd($namaFoto);

        $slug = url_title($this->request->getVar('nama_siswa'), '-', true);
        $this->siswaModel->save([
            'nama_siswa' => $this->request->getVar('nama_siswa'),
            'slug' => $slug,
            'nisn' => $this->request->getVar('nisn'),
            'ttl' => $this->request->getVar('ttl'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'agama' => $this->request->getVar('agama'),
            'status_kel' => $this->request->getVar('status_kel'),
            'alamat_siswa' => $this->request->getVar('alamat_siswa'),
            'sekolah_asal' => $this->request->getVar('sekolah_asal'),
            'tgl_diterima' => $this->request->getVar('tgl_diterima'),
            'ayah' => $this->request->getVar('ayah'),
            'ibu' => $this->request->getVar('ibu'),
            'alamat_ortu' => $this->request->getVar('alamat_ortu'),
            'no_tel_rumah' => $this->request->getVar('no_tel_rumah'),
            'pekerjaan_ayah' => $this->request->getVar('pekerjaan_ayah'),
            'pekerjaan_ibu' => $this->request->getVar('pekerjaan_ibu'),
            'nama_wali' => $this->request->getVar('nama_wali'),
            'alamat_wali' => $this->request->getVar('alamat_wali'),
            'no_wali' => $this->request->getVar('no_wali'),
            'pekerjaan_wali' => $this->request->getVar('pekerjaan_wali'),
            'foto_siswa' => $namaFoto
        ]);

        $id_siswa = $this->siswaModel->select('id_siswa, nama_siswa')->orderBy('id_siswa', 'DESC')->limit(1)->get()->getResult();
        $this->userModel->save([
            'username' => $this->request->getVar('username'),
            'password_hash' => MD5($this->request->getVar('password')),
            'email' => $this->request->getVar('email'),
            'id_siswa' => $id_siswa[0]->id_siswa
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/siswa');
    }

    public function delete($id_siswa)
    {
        //cari gambar berdasarkan id
        $siswa = $this->siswaModel->find($id_siswa);

        //jika gambar default
        if ($siswa['foto_siswa'] != 'default.svg') {

            //hapus gambar
            unlink('img/' . $siswa['foto_siswa']);
        }
        $this->siswaModel->delete($id_siswa);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/siswa');
    }

    public function update($id_siswa)
    {
        $fotoLama = $this->siswaModel->getSiswa($this->request->getVar('slug'));
        if ($fotoLama['nama_siswa'] == $this->request->getVar('nama_siswa')) {
            $rule_siswa = 'required';
        } else {
            $rule_siswa = 'required';
        }

        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'valid_email' => '{field} ini bukan e-mail.'
                ]
            ],
            'password_hash' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'nama_siswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'nisn' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'ttl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'status_kel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'alamat_siswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'sekolah_asal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'tgl_diterima' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'ayah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'alamat_ortu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'no_tel_rumah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'pekerjaan_ayah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'pekerjaan_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'nama_wali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'alamat_wali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'no_wali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'pekerjaan_wali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'foto_siswa' => [
                'rules' => 'is_image[foto_siswa]|mime_in[foto_siswa,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    // 'max_size' => 'ukuran nya kegedean',
                    'is_image' => 'yang kamu pilih bukan gambar',
                    'mime_in' => 'yang kamu pilih bukan gambar',
                    'required' => '{field} harus di isi.'
                ]
            ]
        ])) {
            return redirect()->to('/siswa/' . $this->request->getVar('slug'))->withInput();
        }

        $file_foto = $this->request->getFile('foto_siswa');
        // dd($file_foto->getError());
        //cek gambar, apakah tetap gambar lama
        if ($file_foto->getError() == 0) {
            unlink('img/' . $this->request->getVar('fotolama'));
            $namaFoto = $file_foto->getRandomName();
            $file_foto->move('img', $namaFoto);
        }


        $slug = url_title($this->request->getVar('nama_siswa'), '-', true);
        $data = [
            'id_siswa' => $id_siswa,
            'nama_siswa' => $this->request->getVar('nama_siswa'),
            'slug' => $slug,
            'nisn' => $this->request->getVar('nisn'),
            'ttl' => $this->request->getVar('ttl'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'agama' => $this->request->getVar('agama'),
            'status_kel' => $this->request->getVar('status_kel'),
            'alamat_siswa' => $this->request->getVar('alamat_siswa'),
            'sekolah_asal' => $this->request->getVar('sekolah_asal'),
            'tgl_diterima' => $this->request->getVar('tgl_diterima'),
            'ayah' => $this->request->getVar('ayah'),
            'ibu' => $this->request->getVar('ibu'),
            'alamat_ortu' => $this->request->getVar('alamat_ortu'),
            'no_tel_rumah' => $this->request->getVar('no_tel_rumah'),
            'pekerjaan_ayah' => $this->request->getVar('pekerjaan_ayah'),
            'pekerjaan_ibu' => $this->request->getVar('pekerjaan_ibu'),
            'nama_wali' => $this->request->getVar('nama_wali'),
            'alamat_wali' => $this->request->getVar('alamat_wali'),
            'no_wali' => $this->request->getVar('no_wali'),
            'pekerjaan_wali' => $this->request->getVar('pekerjaan_wali'),
        ];
        if ($file_foto->getError() == 0) {
            $data['foto_siswa'] = $namaFoto;
        }
        $this->siswaModel->save($data);

        $id_user = $this->userModel->select('id')->where('id_siswa', $id_siswa)->get()->getFirstRow();
        $this->userModel->save([
            'username' => $this->request->getVar('username'),
            'password_hash' => MD5($this->request->getVar('password')),
            'email' => $this->request->getVar('email'),
            'id' => $id_user->id
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/siswa');
    }
}

// siswa
// -data siswa
// -data nilai
// -rapot 