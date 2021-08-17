<?php

namespace App\Controllers;

use App\Models\TipeSpartModel;

class TipeSpart extends BaseController
{
	protected $TipeSpartModel;
	private $id_admin;
	private $role;
	private $session;

	public function __construct()
	{
		$this->TipeSpartModel = new TipeSpartModel();
		//date_default_timezone_set('Asia/Jakarta');
	}

	public function getUserInfo()
	{
		$this->session = session();
		$this->id_admin = $this->session->get('user_id');
		$this->role = $this->session->get('role');
	}

	//TAMBAHIN INI BRAY BIAR GAK LOGIN DULU MASUKIN AJA SALAH SATU ADMIN (Selain Superadmin)
	//username : aditpras, password : polman123, role 0, logged_in : true
	public function tesinit()
	{
		$session = session();
		$session_data = [
			'user_id' => 8,
			'user_name' => "aditpras",
			'role' => 0,
			'logged_in' => true
		];
		$session->set($session_data);
	}

	public function index()
	{
		//PANGGIL tesinitnya di tiap method INI JANGAN LUPA BRAY
		$this->tesinit();

		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$TipeSpart = $this->TipeSpartModel->findAll();
			$data = [
				'title' => 'Daftar TipeSparePart',
				'TipeSpart' => $TipeSpart
			];

			return view('TipeSpart/Index', $data);
		} else {
			return redirect()->to(base_url() . "/");
		}
	}

	public function Tambah()
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$data = [
				'title' => 'Add TipeSparePart',
			];
			return view('TipeSpart/Create', $data);
		} else {
			return redirect()->to(base_url() . "/");
		}
	}

	public function save()
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$this->session = session();
			$this->TipeSpartModel->save([
				'nama_jenis_spart' => $this->request->getVar('nama_jenis_spart'),
				'status' => 1
			]);

			$this->session->setFlashdata('result', 'create');

			return redirect()->to(base_url() . "/TipeSpart/Index");
		} else {
			return redirect()->to(base_url() . "/");
		}
	}


	public function Hapus($id_jenis_spare_part)
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$TipeSpartModel = new TipeSpartModel();

			$data = array(
				'TipeSpart' => $TipeSpartModel->find($id_jenis_spare_part)
			);
			//dd($data);
			return view('TipeSpart/Delete', $data);
		} else {
			return redirect()->to(base_url() . "/");
		}
	}

	public function deleteconfirmed($id_jenis_spart)
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$this->session = session();

			$this->TipeSpartModel->update($id_jenis_spart, [
				'status' => 0
			]);

			$this->session->setFlashdata('result', 'delete');

			return redirect()->to(base_url() . "/TipeSpart/Index");
		} else {
			return redirect()->to(base_url() . "/");
		}
	}


	public function Ubah($id_jenis_spart)
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$TipeSpartModel = new TipeSpartModel();

			$data = array(
				'TipeSpart' => $TipeSpartModel->find($id_jenis_spart)
			);
			//dd($data);
			return view('TipeSpart/Edit', $data);
		} else {
			return redirect()->to(base_url() . "/");
		}
	}
	public function update($id_jenis_spart)
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$this->session = session();


			$this->TipeSpartModel->update($id_jenis_spart, [
				'nama_jenis_spart' => $this->request->getVar('nama_jenis_spart')
			]);

			//flash message
			$this->session->setFlashdata('result', 'edit');

			return redirect()->to(base_url() . "/TipeSpart/Index");
		} else {
			return redirect()->to(base_url() . "/");
		}
	}
}
