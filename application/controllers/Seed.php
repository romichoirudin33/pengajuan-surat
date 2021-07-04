<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Seed extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Application_model');
        $this->load->model('User_model');
        $this->load->model('Penduduk_model');
        $this->load->model('Surat_model');
        $this->load->model('Pengajuan_surat_model');
    }

    public function index()
    {
        $this->application();
        $this->user();
        // $this->penduduk();
        $this->surat();
        // $this->pengajuan_surat();
    }

    public function empty()
    {
        if ($this->Application_model->empty()) {
            echo 'Empty table application finished <br>';
        }

        if ($this->User_model->empty()) {
            echo 'Empty table users finished <br>';
        }

        if ($this->Penduduk_model->empty()) {
            echo 'Empty table penduduk finished <br>';
        }

        if ($this->Surat_model->empty()) {
            echo 'Empty table Surat finished <br>';
        }

        if ($this->Pengajuan_surat_model->empty()) {
            echo 'Empty table Pengajuan Surat finished <br>';
        }
    }

    public function refresh()
    {
        $this->empty();
        $this->index();
    }

    private function application()
    {
        $cek = $this->Application_model->all();
        if (count($cek) == 0) {
            $data = [
                'name' => 'Pengajuan Surat',
                'address' => 'Ds. Akar-akar Kab. Lombok Utara',
                'description' => 'Aplikasi pengajuan surat warga Ds. Akar-akar',
                'icon' => 'icon.png',
                'logo' => 'logo.png',
                'photo' => 'photo.png',
            ];
            $this->Application_model->create($data);
            echo 'Seeder Appliation finished <br>';
        }
    }

    private function user()
    {
        $cek = $this->User_model->all();
        if (count($cek) == 0) {
            $data = [
                'name' => 'Kepala Desa',
                'email' => 'root@app.com',
                'username' => 'root@app.com',
                'password' => 'password',
                'address' => '',
                'photo' => 'user.png',
                'role' => 'root',
            ];
            $this->User_model->create($data);
            echo 'Seeder User Root (Kepala desa) finished <br>';
            
            $data = [
                'name' => 'Admin',
                'email' => 'admin@app.com',
                'username' => 'admin@app.com',
                'password' => 'password',
                'address' => '',
                'photo' => 'user.png',
                'role' => 'admin',
            ];
            $this->User_model->create($data);
            echo 'Seeder User Administrator finished <br>';
        }
    }

    public function penduduk()
    {
        $cek = $this->Penduduk_model->all();
        if (count($cek) == 0) {
            $this->load->helper('string');
            $agama = ['Islam','Hindu','Kristen','Katholik','Budha'];
            $jenis_kelamin = ['Laki-laki','Perempuan'];
            $status = ['Belum Kawin','Kawin', 'Cerai Hidup', 'Cerai Mati'];
            for ($i=1; $i <= 400; $i++) {
                $data = [
                    'nik' => random_int(1111111111, 9999999999),
                    'nama_lengkap' => random_string('alnum', 16),
                    'tempat_lahir' => 'lombok utara',
                    'tanggal_lahir' => date('Y-m-d', rand(strtotime('1960-01-01'), strtotime('2020-12-31'))),
                    'alamat' => 'alamat',
                    'agama' => $agama[array_rand($agama, 1)],
                    'jenis_kelamin' => $jenis_kelamin[array_rand($jenis_kelamin, 1)] ,
                    'status_kawin' => $status[array_rand($status, 1)] ,
                    'pekerjaan' => 'Pekerjaan',
                    'kewarganegaraan' => 'wni',
                    'photo' => 'empty.png',
                ];
                $this->Penduduk_model->create($data);
            }
            echo 'Seeder Penduduk'.$i.' <br>';
        }
    }

    public function surat()
    {
        $surat = [
            'Surat keterangan umum',
            'Surat keterangan tidak mampu',
            'Surat keterangan usaha',
            'Surat keterangan domisili tempat tinggal',
            'Surat keterangan domisili usaha',
            'Surat pemberitahuan umum',
            'Surat pernyataan umum',
            'Surat pengantar umum',
            'Surat pengantar catatan kepolisian',
            'Surat keterangan kelahiran',
            'Surat permohonan KTP',
            'Surat permohonan KK',
            'Surat permohonan pindah',
            'Surat permohonan kematian',
        ];
        $cek = $this->Surat_model->all();
        if (count($cek) == 0) {
            foreach ($surat as $i) {
                $data = [
                    'jenis_surat' => $i,
                    'keterangan_surat' => $i,
                    'contoh_file' => strtolower(str_replace(' ', '_', $i).'.pdf'),
                ];
                $this->Surat_model->create($data);
                echo 'Seeder '.$i.' finished <br>';
            };
        }
    }

    public function pengajuan_surat()
    {
        $cek = $this->Pengajuan_surat_model->all();
        if (count($cek) == 0) {
            for ($i=1; $i <= 10; $i++) {
                $surat = $this->Surat_model->random()->jenis_surat ?? 'Surat';
                $nik = $this->Penduduk_model->random()->nik ?? '123123123';
                $status_proses = ['baru','dikonfirmasi','ditolak','diproses','berhasil'];
                $data = [
                    'nik' => $nik,
                    'pengajuan_surat' => $surat,
                    'status_proses' =>$status_proses[array_rand($status_proses, 1)],
                    'email' => 'mail@mail.com',
                    'no_hp' => '6281907123123'
                ];
                $this->Pengajuan_surat_model->create($data);
                echo 'Seeder Pengajuan Surat finished <br>';
            }
        }
    }
}

/* End of file Seed.php */
