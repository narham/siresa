<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'user';
    protected $primaryKey           = 'id_user';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['nama', 'email', 'hp', 'password', 'foto', 'status', 'kelurahan_id', 'level'];

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

    public function get_all()
    {
        # code...
        $db = db_connect();
        $builder = $db->table('kelurahan');
        $builder->select('*');
        $builder->join('user', 'user.kelurahan_id = kelurahan.id_kelurahan');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function get_profle($id_user)
    {
        $db = db_connect();
        $builder = $db->table('kelurahan');
        $builder->select('*');
        $builder->join('user', 'user.kelurahan_id = kelurahan.id_kelurahan');
        $query = $builder->where('id_user', $id_user)->get();
        return $query->getRow();
    }

    public function get_pendata()
    {
        $db = db_connect();
        $builder = $db->table('kelurahan');
        $builder->select('*');
        $builder->join('user', 'user.kelurahan_id = kelurahan.id_kelurahan');
        $query = $builder;
        return $query;
    }

    public function get_kolektor()
    {
        $db = db_connect();
        $builder = $db->table('kelurahan');
        $builder->select('*');
        $builder->join('user', 'user.kelurahan_id = kelurahan.id_kelurahan');
        $query = $builder;
        return $query;
    }
}