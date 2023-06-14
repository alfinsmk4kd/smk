<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSiswa;
use App\Models\ModelJalurMasuk;
use App\Models\ModelAgama;
use App\Models\ModelPekerjaan;
use App\Models\ModelPendidikan;
use App\Models\ModelPenghasilan;
use App\Models\ModelWilayah;
use App\Models\ModelLampiran;
use App\Models\ModelJurusan;
use App\Models\ModelAdmin;


class Siswa extends BaseController
{

	public function __construct()
	{
		$this->ModelSiswa = new ModelSiswa();
		$this->ModelJalurMasuk = new ModelJalurMasuk();
		$this->ModelAgama = new ModelAgama();
		$this->ModelPekerjaan = new ModelPekerjaan();
		$this->ModelPendidikan = new ModelPendidikan();
		$this->ModelPenghasilan = new ModelPenghasilan();
		$this->ModelWilayah = new ModelWilayah();
		$this->ModelLampiran = new ModelLampiran();
		$this->ModelJurusan = new ModelJurusan();
		$this->ModelAdmin = new ModelAdmin();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Siswa',
			'siswa'		=> $this->ModelSiswa->getBiodataSiswa(),
			'jalur'		=> $this->ModelJalurMasuk->getAllData(),
			'agama'		=> $this->ModelAgama->getAllData(),
			'pekerjaan'	=> $this->ModelPekerjaan->getAllData(),
			'pendidikan' => $this->ModelPendidikan->getAllData(),
			'penghasilan' => $this->ModelPenghasilan->getAllData(),
			'provinsi' => $this->ModelWilayah->getProvinsi(),
			'berkas' => $this->ModelSiswa->lampiran(),
			'lampiran' => $this->ModelLampiran->getAllData(),
			'jurusan' => $this->ModelJurusan->getAllData(),
			'validation' => \Config\Services::validation(),
		];
		return view('siswa/v_formulir', $data);
	}

	public function updatePendaftaran($id_siswa)
	{
		$data = [
			'id_siswa' => $id_siswa,
			'id_jalur_masuk' => $this->request->getPost('id_jalur_masuk'),
			'id_jurusan' => $this->request->getPost('id_jurusan'),
		];
		$this->ModelSiswa->editData($data);
		session()->setFlashdata('pesan', 'Data Pendaftaran Berhasil Di Update !!!');
		return redirect()->to('/Siswa');
	}

	public function updateFoto($id_siswa)
	{

		if ($this->validate([
			'foto' => [
				'label' => 'Foto',
				'rules' => 'max_size[foto,1024]',
				'errors' => [
					'max_size' => 'Ukuran {field} Harus Max 1024 !!!',
				]
			]
		])) {

			//hapus foto lama
			$siswa = $this->ModelSiswa->detailData($id_siswa);
			if ($siswa['foto'] != "" or $siswa['foto'] != null) {
				unlink('./foto/' . $siswa['foto']);
			}

			$file = $this->request->getFile('foto');
			$nama_file = $file->getRandomName();
			$data = [
				'id_siswa' => $id_siswa,
				'foto'	=> $nama_file,
			];
			//upload file foto
			$file->move('foto/', $nama_file);
			$this->ModelSiswa->editData($data);
			session()->setFlashdata('pesan', 'Foto Berhasil Di Update !!!');
			return redirect()->to('/Siswa');
		} else {
			//jika ada validasi
			$validation =  \Config\Services::validation();
			return redirect()->to('/Siswa')->withInput()->with('validation', $validation);
		}
	}

	public function updateIdentitasSiswa($id_siswa)
	{

		$data = [
			'id_siswa' => $id_siswa,
			'nama_lengkap' => $this->request->getPost('nama_lengkap'),
			'nama_panggilan' => $this->request->getPost('nama_panggilan'),
			'tempat_lahir' => $this->request->getPost('tempat_lahir'),
			'tgl_lahir' => $this->request->getPost('tgl_lahir'),
			'jk' => $this->request->getPost('jk'),
			'id_agama' => $this->request->getPost('id_agama'),
			'nik' => $this->request->getPost('nik'),
			'tinggi' => $this->request->getPost('tinggi'),
			'berat' => $this->request->getPost('berat'),
			'jml_saudara' => $this->request->getPost('jml_saudara'),
			'anak_ke' => $this->request->getPost('anak_ke'),
			'no_telpon' => $this->request->getPost('no_telpon'),
		];
		$this->ModelSiswa->editData($data);
		session()->setFlashdata('pesan', 'Indentitas Siswa Berhasil Di Update !!!');
		return redirect()->to('/Siswa');
	}

	public function updateDataAyah($id_siswa)
	{

		$data = [
			'id_siswa' => $id_siswa,
			'nik_ayah' => $this->request->getPost('nik_ayah'),
			'nama_ayah' => $this->request->getPost('nama_ayah'),
			'pendidikan_ayah' => $this->request->getPost('pendidikan_ayah'),
			'pekerjaan_ayah' => $this->request->getPost('pekerjaan_ayah'),
			'penghasilan_ayah' => $this->request->getPost('penghasilan_ayah'),
			'no_telpon_ayah' => $this->request->getPost('no_telpon_ayah'),
		];
		$this->ModelSiswa->editData($data);
		session()->setFlashdata('pesan', 'Data Ayah Berhasil Di Update !!!');
		return redirect()->to('/Siswa');
	}

	public function updateDataIbu($id_siswa)
	{

		$data = [
			'id_siswa' => $id_siswa,
			'nik_ibu' => $this->request->getPost('nik_ibu'),
			'nama_ibu' => $this->request->getPost('nama_ibu'),
			'pendidikan_ibu' => $this->request->getPost('pendidikan_ibu'),
			'pekerjaan_ibu' => $this->request->getPost('pekerjaan_ibu'),
			'penghasilan_ibu' => $this->request->getPost('penghasilan_ibu'),
			'no_telpon_ibu' => $this->request->getPost('no_telpon_ibu'),
		];
		$this->ModelSiswa->editData($data);
		session()->setFlashdata('pesan', 'Data Ibu Berhasil Di Update !!!');
		return redirect()->to('/Siswa');
	}

	public function updateDataAlamat($id_siswa)
	{
		$data = [
			'id_siswa' => $id_siswa,
			'id_provinsi' => $this->request->getPost('id_provinsi'),
			'id_kecamatan' => $this->request->getPost('id_kecamatan'),
			'id_kabupaten' => $this->request->getPost('id_kabupaten'),
			'alamat' => $this->request->getPost('alamat'),
		];
		$this->ModelSiswa->editData($data);
		session()->setFlashdata('pesan', 'Data Alamat Berhasil Di Update !!!');
		return redirect()->to('/Siswa');
	}

	public function updateSekolahAsal($id_siswa)
	{
		$data = [
			'id_siswa' => $id_siswa,
			'tahun_lulus' => $this->request->getPost('tahun_lulus'),
			'nama_sekolah_asal' => $this->request->getPost('nama_sekolah_asal'),
			'no_ijazah' => $this->request->getPost('no_ijazah'),
			'no_skhun' => $this->request->getPost('no_skhun'),
		];
		$this->ModelSiswa->editData($data);
		session()->setFlashdata('pesan', 'Data Sekolah Asal Berhasil Di Update !!!');
		return redirect()->to('/Siswa');
	}

	public function addBerkas($id_siswa)
	{
		if ($this->validate([
			'id_lampiran' => [
				'label' => 'Lampiran',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Belum Dipilih !!!',
				]
			],
			'berkas' => [
				'label' => 'Berkas',
				'rules' => 'max_size[berkas,1024]|ext_in[berkas,pdf]',
				'errors' => [
					'max_size' => 'Ukuran {field} Harus Max 1024 !!!',
					'ext_in' => '{field} Harus PDF !!!',
				]
			]
		])) {
			$berkas = $this->request->getFile('berkas');
			$nama_file = $berkas->getRandomName();

			$data = [
				'id_siswa' => $id_siswa,
				'id_lampiran' => $this->request->getPost('id_lampiran'),
				'ket' => $this->request->getPost('ket'),
				'berkas' => $nama_file
			];
			//upload file foto
			$berkas->move('berkas/', $nama_file);
			$this->ModelSiswa->addBerkas($data);
			session()->setFlashdata('pesan', 'Berkas Berhasil Di Upload !!!');
			return redirect()->to('/Siswa');
		} else {
			//tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('/Siswa'));
		}
	}

	public function updateNilai($id_siswa)
	{
		$data = [
			'id_siswa' => $id_siswa,
			'mm' => $this->request->getPost('mm'),
			'indo' => $this->request->getPost('indo'),
			'ingg' => $this->request->getPost('ingg'),
			'ipa' => $this->request->getPost('ipa')
		];
		$this->ModelSiswa->editData($data);
		session()->setFlashdata('pesan', 'Data Nilai Berhasil Di Update !!!');
		return redirect()->to('/Siswa');
	}

	public function deleteBerkas($id_berkas)
	{
		$berkas = $this->ModelSiswa->detailBerkas($id_berkas);
		if ($berkas['berkas'] != "") {
			unlink('./berkas/' . $berkas['berkas']);
		}
		$data = [
			'id_berkas' => $id_berkas,
		];
		$this->ModelSiswa->deleteBerkas($data);
		session()->setFlashdata('pesan', 'Berkas Berhasil Di Delete !!!');
		return redirect()->to('/Siswa');
	}

	public function apply($id_siswa)
	{
		$data = [
			'id_siswa' => $id_siswa,
			'stat_pendaftaran' => '1'
		];
		$this->ModelSiswa->editData($data);
		session()->setFlashdata('pesan', 'Pendaftaran Berhasil Dikirim !!!');
		return redirect()->to('/Siswa');
	}

	public function bukti_lulus()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Siswa',
			'siswa'		=> $this->ModelSiswa->getBiodataSiswa(),
			'setting' => $this->ModelAdmin->detailSetting(),
		];
		return view('siswa/v_buktilulus', $data);
	}
}
