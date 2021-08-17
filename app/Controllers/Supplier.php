<?php

namespace App\Controllers;

use App\Models\SupplierModel;

class Supplier extends BaseController
{
	protected $SupplierModel;
	private $id_admin;
	private $role;
	private $session;

	public function __construct()
	{
		$this->SupplierModel = new SupplierModel();
		//date_default_timezone_set('Asia/Jakarta');
	}

	public function getUserInfo()
	{
		$this->session = session();
		$this->id_admin = $this->session->get('user_id');
		$this->role = $this->session->get('role');
	}

	//TAMBAHIN INI BRAY BIAR GAK LOGIN DULU MASUKIN AJA SALAH SATU Supplier (Selain SuperSupplier)
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
		if (isset($this->id_admin) && $this->role == '1') {
			$Supplier = $this->SupplierModel->findAll();
			$data = [
				'title' => 'Daftar Supplier',
				'Supplier' => $Supplier
			];

			return view('Supplier/Index', $data);
		} else {
			return redirect()->to(base_url() . "/");
		}
	}

	public function Tambah()
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '1') {
			$data = [
				'title' => 'Add Supplier',
			];
			return view('Supplier/Create', $data);
		} else {
			return redirect()->to(base_url() . "/");
		}
	}

	public function save()
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '1') {
			$updated = date("Y-m-d H:i:s");
			$this->session = session();
			$this->SupplierModel->save([
				'nama_supplier' => $this->request->getVar('nama_supplier'),				
				'alamat' => $this->request->getVar('alamat'),			
				'tanggal_dibuat' => $updated,
				'terakhir_diubah' => $updated,				
				'status' => 1,
                'id_admin' => $this->session->get('user_id')
			]);

			$this->session->setFlashdata('result', 'create');

			return redirect()->to(base_url() . "/Supplier/Index");
		} else {
			return redirect()->to(base_url() . "/");
		}
	}


	public function Hapus($id_Supplier)
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '1') {
			$SupplierModel = new SupplierModel();

			$data = array(
				'Supplier' => $SupplierModel->find($id_Supplier)
			);
			//dd($data);
			return view('Supplier/Delete', $data);
		} else {
			return redirect()->to(base_url() . "/");
		}
	}

	public function deleteconfirmed($id_Supplier)
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '1') {
			$updated = date("Y-m-d H:i:s");
			$this->session = session();

			$this->SupplierModel->update($id_Supplier, [
				'status' => 0,
				'terakhir_diubah' => $updated
			]);

			$this->session->setFlashdata('result', 'delete');

			return redirect()->to(base_url() . "/Supplier/Index");
		} else {
			return redirect()->to(base_url() . "/");
		}
	}


	public function Ubah($id_Supplier)
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '1') {
			$SupplierModel = new SupplierModel();

			$data = array(
				'Supplier' => $SupplierModel->find($id_Supplier)
			);
			//dd($data);
			return view('Supplier/Edit', $data);
		} else {
			return redirect()->to(base_url() . "/");
		}
	}

	public function update($id_Supplier)
	{
		$this->getUserInfo();
		if (isset($this->id_admin) && $this->role == '1') {
			$updated = date("Y-m-d H:i:s");
			$this->session = session();


			$this->SupplierModel->update($id_Supplier, [
				'nama_supplier' => $this->request->getVar('nama_supplier'),
				'alamat' => $this->request->getVar('alamat'),
				'terakhir_diubah' => $updated
			]);

			//flash message
			$this->session->setFlashdata('result', 'edit');

			return redirect()->to(base_url() . "/Supplier/Index");
		} else {
			return redirect()->to(base_url() . "/");
		}
	}
}
