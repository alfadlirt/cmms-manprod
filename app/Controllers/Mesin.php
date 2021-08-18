<?php

namespace App\Controllers;

use App\Models\MesinModel;
use App\Models\JenisMesinModel;

class Mesin extends BaseController
{
	protected $MesinModel;
	private $id_admin;
	private $role;
	private $session;

	public function __construct()
	{
		$this->MesinModel = new MesinModel();
		//date_default_timezone_set('Asia/Jakarta');
	}

	public function getUserInfo()
	{
		$this->session = session();
		$this->id_admin = $this->session->get('user_id');
		$this->role = $this->session->get('role');
	}

	//TAMBAHIN INI BRAY BIAR GAK LOGIN DULU MASUKIN AJA SALAH SATU Mesin (Selain SuperMesin)
	//username : aditpras, password : polman123, role 0, logged_in : true
	public function tesinit()
	{
		$session = session();
		$session_data = [
			'user_id' => 1,
			'user_name' => "[SUPERADMIN]",
			'role' => 1,
			'logged_in' => true
		];
		$session->set($session_data);
	}

	public function index()
	{
		//PANGGIL tesinitnya di tiap method INI JANGAN LUPA BRAY
		//$this->tesinit();

		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$Mesin = $this->MesinModel->findAll();
			$data = [
				'title' => 'Daftar Mesin',
				'Mesin' => $Mesin
			];

			return view('Mesin/Index', $data);
		} else {
			return redirect()->to(base_url() . "/");
		}
	}

	public function Tambah()
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$JenisMesinModel = new JenisMesinModel();
			$tipe = $JenisMesinModel->findAll();
			//dd($tipe);
			$data = [
				'title' => 'Add Mesin',
				'tipemesin' => $tipe
			];
			return view('Mesin/Create', $data);
		} else {
			return redirect()->to(base_url() . "/");
		}
	}

	public function save()
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$updated = date("Y-m-d H:i:s");
			$this->session = session();
			$this->MesinModel->save([
				'id_jenis_mesin' => $this->request->getVar('jenis_mesin'),				
				'nama' => $this->request->getVar('nama_mesin'),			
				'tanggal_maintenance' => $this->request->getVar('nextmain'),
                'tanggal_dibuat' => $updated,
				'terakhir_diubah' => $updated,				
				'status' => 1,
                'id_admin' => $this->session->get('user_id')
			]);

			$this->session->setFlashdata('result', 'create');

			return redirect()->to(base_url() . "/Mesin/Index");
		} else {
			return redirect()->to(base_url() . "/");
		}
	}


	public function Hapus($id_Mesin)
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$MesinModel = new MesinModel();

			$data = array(
				'Mesin' => $MesinModel->find($id_Mesin)
			);
			//dd($data);
			return view('Mesin/Delete', $data);
		} else {
			return redirect()->to(base_url() . "/");
		}
	}

	public function deleteconfirmed($id_Mesin)
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$updated = date("Y-m-d H:i:s");
			$this->session = session();

			$this->MesinModel->update($id_Mesin, [
				'status' => 0,
				'terakhir_diubah' => $updated
			]);

			$this->session->setFlashdata('result', 'delete');

			return redirect()->to(base_url() . "/Mesin/Index");
		} else {
			return redirect()->to(base_url() . "/");
		}
	}


	public function Ubah($id_Mesin)
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$MesinModel = new MesinModel();
			$JenisMesinModel = new JenisMesinModel();
			$tipe = $JenisMesinModel->findAll();
			$data = array(
				'Mesin' => $MesinModel->find($id_Mesin),
				'tipemesin'=>$tipe
			);
			//dd($data);
			return view('Mesin/Edit', $data);
		} else {
			return redirect()->to(base_url() . "/");
		}
	}

	public function update($id_Mesin)
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$updated = date("Y-m-d H:i:s");
			$this->session = session();


			$this->MesinModel->update($id_Mesin, [
				'id_jenis_mesin' => $this->request->getVar('jenis_mesin'),		
				'nama' => $this->request->getVar('nama_Mesin'),				
				'tanggal_diubah' => $updated
			]);

			//flash message
			$this->session->setFlashdata('result', 'edit');

			return redirect()->to(base_url() . "/Mesin/Index");
		} else {
			return redirect()->to(base_url() . "/");
		}
	}
}
