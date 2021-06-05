<?php


namespace system\core;


abstract class Model
{
    protected $db;
    protected $table;
    protected $pk = 'id';


    public function __construct()
    {
        $this->db = Db::instance();
    }

    /**
     * @param $sql
     * @return bool
     */
    public function query($sql)
    {
        return $this->db->exec($sql);
    }

    /**
     * @return array
     */
    public function findAll()
    {
        $sql = "SELECT * FROM ". $this->table;
        return $this->db->query($sql);
    }
    /**
     * @param array $params
     * @return mixed
     */
    public function count($params = []){
       $arr = $this->findAll();
       return count($arr);
    }

    /** record DVD
     * @param $sku
     * @param $name
     * @param $price
     * @param $types
     * @param $size
     * @return bool
     */
    public function addDvd($sku, $name, $price, $types, $size)
    {
        $sql = "INSERT INTO {$this->table} SET `sku` = '$sku', `name` = '$name', `price` = '$price', `id_type` = '$types', `size` = '$size'";

        return $this->db->exec($sql,[$sku, $name, $price, $types, $size]);
    }
    /** record Book
     * @param $sku
     * @param $name
     * @param $price
     * @param $types
     * @param $weight
     * @return bool
     */
    public function addBook($sku, $name, $price, $types, $weight){
        $sql = "INSERT INTO {$this->table} SET `sku` = '$sku', `name` = '$name', `price` = '$price', `id_type` = '$types', `weight` = '$weight'";

        return $this->db->exec($sql,[$sku, $name, $price, $types, $weight]);
    }
    /** record Furniture
     * @param $sku
     * @param $name
     * @param $price
     * @param $types
     * @param $height
     * @param $width
     * @param $length
     * @return bool
     */
    public function addFurniture($sku, $name, $price, $types, $height, $width, $length){
        $sql = "INSERT INTO {$this->table} SET `sku` = '$sku', `name` = '$name', `price` = '$price', `id_type` = '$types', `height` = '$height', `width` = '$width', `length` = '$length'";

        return $this->db->exec($sql,[$sku, $name, $price, $types, $height, $width, $length]);
    }

    /**
     * @param $id
     * @return array
     */
    public function getId($id){
        $sql ="SELECT * FROM {$this->table} WHERE id = ?";
        return $this->db->query($sql,[$id]);
    }

    /** deleting multiple records from BD
     * @param array $id
     * @return bool
     */
    public function getDeleteId($id = [])
    {
        $place = implode(', ', array($id));
        $sql = "DELETE FROM {$this->table} WHERE id IN ($place)";
        return $this->db->exec($sql, $id);
    }
}