<?php

    namespace App\Controllers;

    use App\Models\JenisMesinModel;

    class JenisMesin extends BaseController
    {
        protected $JenisMesinModel;
        private $id_admin;
        private $role;
        private $session;

        public function __construct()
        {
            $this->JenisMesinModel = new JenisMesinModel();
        }

        public function getUserInfo()
        {
            $this->session = session();
            $this->id_admin = $this->session->get('user_id');
            $this->role = $this->session->get('role');
        }

        public function index()
        {
            $this->getUserInfo();
            if  (isset($this->id_admin) && $this->role == '0')
            {
                $JenisMesin = $this->JenisMesinModel->findAll();
                $data = [
                    'title' => 'Daftar Jenis Mesin',
                    'JenisMesin' => $JenisMesin
                ];

                //dd($data);

                return view('JenisMesin\Index', $data);
            }
            else
            {
                return redirect()->to(base_url() . "/");
            }
            
        }

        public function Tambah()
        {
            $this->getUserInfo();
            if (isset($this->id_admin) && $this->role == '0') {
                $data = [
                    'title' => 'Add Jenis Mesin',
                ];
                return view('JenisMesin/Create', $data);
            } else {
                return redirect()->to(base_url() . "/");
            }
        }

        public function save()
        {
            $this->getUserInfo();
            if (isset($this->id_admin) && $this->role == '0') {
                $data = [
                    'nama_jenis_mesin' => $this->request->getVar('nama_jenis_mesin'),
                    'status' => 1
                ];
                $this->JenisMesinModel->save($data);
                $this->session->setFlashData('result', 'create');

                return redirect()->to(base_url() . "/JenisMesin/Index");
            }
            else
            {
                return redirect()->to(base_url() . "/");
            }
        }

        public function hapus($id_mesin)
        {
            $this->getUserInfo();
            if (isset($this->id_admin) && $this->role == '0') {
                $JenisMesinModel = new JenisMesinModel();

                $data = array(
                    'JenisMesin' => $JenisMesinModel->find($id_mesin)
                );
                return view('JenisMesin/Delete', $data);
            }
            else
            {
                return redirect()->to(base_url() . "/");
            }
        }

        public function deleteConfirmed($id_mesin)
        {
            $this->getUserInfo();
            if (isset($this->id_admin) && $this->role == '0') {
                $this->session = session();

                $this->JenisMesinModel->update($id_mesin, [
                    'status' => 0
                ]);

                $this->session->setFlashdata('result', 'delete');
                
                return redirect()->to(base_url() . "/JenisMesin/Index");
            }
            else
            {
                return redirect()->to(base_url() . "/");
            }
        }
        
        public function ubah($id_mesin)
        {
            $this->getUserInfo();
            if (isset($this->id_admin) && $this->role == '0') {
                $JenisMesinModel = new JenisMesinModel();

                $data = array(
                    'JenisMesin' => $JenisMesinModel->find($id_mesin)
                );
                return view('JenisMesin/Edit', $data);
            }
            else
            {
                return redirect()->to(base_url() . "/");
            }
        }

        public function update($id_mesin)
        {
            $this->getUserInfo();
            if (isset($this->id_admin) && $this->role == '0') {
                $this->session = session();                        

                $this->JenisMesinModel->update($id_mesin, [
                    'nama_jenis_mesin' => $this->request->getVar('nama_jenis_mesin')
                ]);

                $this->session->setFlashdata('result', 'edit');

                return redirect()->to(base_url() . "/JenisMesin/Index");
            }
            else
            {
                return redirect()->to(base_url() . "/");
            }
        }
    }
?>