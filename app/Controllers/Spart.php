<?php

namespace App\Controllers;

use App\Models\SpartModel;
use App\Models\TipeSpartModel;
use App\Models\SupplierModel;

class Spart extends BaseController
{
	protected $SpartModel;
	protected $tipeSpartModel;
	protected $supplierModel;
	private $id_admin;
	protected $tipeSpartModel;
	private $role;
	private $session;

	public function __construct()
	{
		$this->SpartModel = new SpartModel();
		$this->tipeSpartModel = new TipeSpartModel();
		$this->supplierModel = new SupplierModel();
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
		$this->tipeSpartModel = new TipeSpartModel();
		//$tipeSpart = $this->TipeSpartModel->findAll();
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$Spart = $this->SpartModel->findAll();
			$data = [
				'title' => 'Daftar SparePart',
				'Spart' => $Spart
				//'tipeSpart' => $tipeSpart
			];

			return view('Spart/Index', $data);
		} else {
			return redirect()->to(base_url() . "/");
		}
	}

	public function Tambah()
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$tipeSpart = $this->tipeSpartModel->findAll();
			$supplier = $this->supplierModel->findAll();
			$data = [
				'title' => 'Add SparePart',
				'tipeSpart' => $tipeSpart,
				'supplier' => $supplier
			];
			return view('Spart/Create', $data);
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
			$this->SpartModel->save([
				'id_jenis_spart' => $this->request->getVar('id_jenis_spart'),
				'nama' => $this->request->getVar('nama'),
				'id_supplier' => $this->request->getVar('id_supplier'),
				'tanggal_dibuat' => $updated,
				'terakhir_diubah' => $updated,
				'status' => 1,
				'id_admin' => 1
			]);

			$this->session->setFlashdata('result', 'create');

			return redirect()->to(base_url() . "/Spart/Index");
		} else {
			return redirect()->to(base_url() . "/");
		}
	}


	public function Hapus($id_spare_part)
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$SpartModel = new SpartModel();

			$data = array(
				'Spart' => $SpartModel->find($id_spare_part)
			);
			//dd($data);
			return view('Spart/Delete', $data);
		} else {
			return redirect()->to(base_url() . "/");
		}
	}

	public function deleteconfirmed($id_spare_part)
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$updated = date("Y-m-d H:i:s");
			$this->session = session();

			$this->SpartModel->update($id_spare_part, [
				'status' => 0,
				'tanggal_diubah' => $updated
			]);

			$this->session->setFlashdata('result', 'delete');

			return redirect()->to(base_url() . "/Spart/Index");
		} else {
			return redirect()->to(base_url() . "/");
		}
	}


	public function Ubah($id_spare_part)
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$SpartModel = new SpartModel();
			$supplier = $this->supplierModel->findAll();
			$data = [
				'title' => 'Add SparePart',
				'tipeSpart' => $tipeSpart,
				'supplier' => $supplier
			];
			//dd($data);
			return view('Spart/Edit', $data);
		} else {
			return redirect()->to(base_url() . "/");
		}
	}
	public function update($id_spare_part)
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '0') {
			$updated = date("Y-m-d H:i:s");
			$this->session = session();


			$this->SpartModel->update($id_spare_part, [
				'nama' => $this->request->getVar('nama'),
				'id_jenis_spart' => $this->request->getVar('id_jenis_spart'),
				'id_supplier' => $this->request->getVar('id_supplier'),
				'last_modified' => $updated
			]);

			//flash message
			$this->session->setFlashdata('result', 'edit');

			return redirect()->to(base_url() . "/Spart/Index");
		} else {
			return redirect()->to(base_url() . "/");
		}
	}
}
