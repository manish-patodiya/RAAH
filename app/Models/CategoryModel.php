<?php
namespace App\Models\product_models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    public $builder;
    public $db;
    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table('categories');

    }

    public function insertData($data)
    {
        $builder = $this->builder;
        $data1 = [
            "updated_at" => date('Y-m-d'),
            "created_at" => date('Y-m-d'),
        ];
        $data = array_merge($data, $data1);
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function getAll()
    {
        $builder = $this->builder;
        $builder->select("*");
        $builder->where("deleted_at is NULL");
        return $builder->get()->getResult();
    }

    public function updateRow($data, $where)
    {
        $data1 = [
            "updated_at" => date('Y-m-d'),
        ];
        $data = array_merge($data, $data1);
        $builder = $this->builder;
        $builder->set($data);
        $builder->where($where);
        return $builder->update();
    }
    public function deleteRow($id)
    {
        $builder = $this->builder;
        $builder->set(['deleted_at' => date('Y-m-d')]);
        $builder->where('id', $id);
        $builder->orWhere('pid', $id);
        $builder->update();
    }
    public function get_category_by_id($id)
    {
        $this->builder->select('*')
            ->where('id', $id);
        // echo $this->db->getLastQuery();die;
        return $this->builder->get()->getRowArray();
    }
    public function get_category($id)
    {
        return $this->builder->select('*')
            ->where('id', $id)
            ->get()->getRow();
    }

    public $items = [];
    public function script($navbar_items, $pid = 0)
    {
        $data = [];
        foreach ($navbar_items as $k => $item) {
            if (is_array($item)) {
                $this->builder->insert([
                    'pid' => $pid,
                    'category_name' => ucwords($k),
                ]);
                $id = $this->db->insertID();
                $this->script($item, $id);
            } else {
                $data[] = [
                    "pid" => $pid,
                    'category_name' => ucwords($item),
                ];
            }
        }
        if ($data) {
            $this->builder->insertBatch($data);
        }
    }
}