<?php

namespace App\Models;

use CodeIgniter\Model;

class PotensiModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'potensi';
    protected $primaryKey           = 'id_potensi';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['nama', 'alamat', 'rt', 'rw', 'kelurahan_id', 'zona', 'kelas', 'status'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    public function get_pot()
    {
        // Join Tabel
        $db = db_connect();
        $builder = $db->table('kelurahan');
        $builder->select('*');
        $builder->join('potensi', 'potensi.kelurahan_id = kelurahan.id_kelurahan');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function potensi_by_kelurahan($id_kelurahan)
    {
        $db = db_connect();
        $builder = $db->table('kelurahan');
        $builder->select('*');
        $builder->join('potensi', 'potensi.kelurahan_id = kelurahan.id_kelurahan');
        $query = $builder->where('kelurahan_id', $id_kelurahan)->get();
        return $query->getResultArray();
    }

    public function sum_pot($id_kelurahan)
    {
        $db = db_connect();
        $builder = $db->table('potensi');

        $query = $builder->where('kelurahan_id', $id_kelurahan)->countAllResults();
        return $query;
    }

    public function sum_aktif($id_kelurahan)
    {
        $db = db_connect();
        $builder = $db->table('potensi');

        $builder->where(['kelurahan_id' => $id_kelurahan, 'status' => 1]);
        $query = $builder->countAllResults();
        return $query;
    }

    public function sum_off($id_kelurahan)
    {
        $db = db_connect();
        $builder = $db->table('potensi');

        $builder->where(['kelurahan_id' => $id_kelurahan, 'status' => 2]);
        $query = $builder->countAllResults();
        return $query;
    }

    public function sum_all_pot()
    {
        $db = db_connect();
        $builder = $db->table('potensi');

        $query = $builder->countAll();
        return $query;
    }
}