<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Maintenance extends BaseController
{
	protected $AdminModel;
	private $id_admin;
	private $role;
	private $session;

	public function __construct()
	{
		$this->AdminModel = new AdminModel();
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
		//$this->tesinit();

		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$Admin = $this->AdminModel->findAll();
			$data = [
				'title' => 'Daftar Admin',
				'Admin' => $Admin
			];

			return view('Admin/Index', $data);
		} else {
			return redirect()->to(base_url() . "/");
		}
	}

	public function Tambah()
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$data = [
				'title' => 'Add Admin',
			];
			return view('Admin/Create', $data);
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
			$this->AdminModel->save([
				'nama_admin' => $this->request->getVar('nama_admin'),
				'role' => 0,
				'email_admin' => $this->request->getVar('email'),
				'username' => $this->request->getVar('username'),
				'password' => password_hash('polman123', PASSWORD_DEFAULT),
				'date_created' => $updated,
				'last_modified' => $updated,
				'created_by' => $this->session->get('user_id'),
				'status' => 1
			]);

			$this->session->setFlashdata('result', 'create');

			return redirect()->to(base_url() . "/Admin/Index");
		} else {
			return redirect()->to(base_url() . "/");
		}
	}


	public function Hapus($id_Admin)
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$AdminModel = new AdminModel();

			$data = array(
				'Admin' => $AdminModel->find($id_Admin)
			);
			//dd($data);
			return view('Admin/Delete', $data);
		} else {
			return redirect()->to(base_url() . "/");
		}
	}

	public function deleteconfirmed($id_admin)
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$updated = date("Y-m-d H:i:s");
			$this->session = session();

			$this->AdminModel->update($id_admin, [
				'status' => 0,
				'last_modified' => $updated
			]);

			$this->session->setFlashdata('result', 'delete');

			return redirect()->to(base_url() . "/Admin/Index");
		} else {
			return redirect()->to(base_url() . "/");
		}
	}


	public function Ubah($id_Admin)
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$AdminModel = new AdminModel();

			$data = array(
				'Admin' => $AdminModel->find($id_Admin)
			);
			//dd($data);
			return view('Admin/Edit', $data);
		} else {
			return redirect()->to(base_url() . "/");
		}
	}
	public function update($id_admin)
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$updated = date("Y-m-d H:i:s");
			$this->session = session();


			$this->AdminModel->update($id_admin, [
				'nama_admin' => $this->request->getVar('nama_admin'),
				'email_admin' => $this->request->getVar('email'),
				'last_modified' => $updated
			]);

			//flash message
			$this->session->setFlashdata('result', 'edit');

			return redirect()->to(base_url() . "/Admin/Index");
		} else {
			return redirect()->to(base_url() . "/");
		}
	}
}
