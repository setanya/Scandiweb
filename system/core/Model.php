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

    /**add Product to the database
     * @param $sku
     * @param $name
     * @param $price
     * @param $types
     * @param $size
     * @param $weight
     * @param $height
     * @param $width
     * @param $length
     * @return bool
     */
        public function addProduct($sku, $name, $price, $types, $size, $weight, $height, $width, $length)
    {
        $sql = "INSERT INTO {$this->table} SET `sku` = '$sku', `name` = '$name', `price` = '$price', `type` = '$types', `size` = '$size MB', `weight` = '$weight KG', `height` = '$height', `width` = '$width', `length` = '$length'";

        return $this->db->exec($sql,[$sku, $name, $price, $types, $size, $weight, $height, $width, $length]);
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

    /** getting an object  Dvd
     * @param $tip
     * @return array
     */
    public function getDvdId($tip){
        $sql ="SELECT `id`,`sku`,`name`,`price`,`type`,`size` AS value_tip FROM {$this->table} WHERE `type`= ?";

        return $this->db->query($sql,[$tip]);
    }

    /**getting an object Book
     * @param $tip
     * @return array
     */
    public function getBookId($tip){
        $sql ="SELECT `id`,`sku`,`name`,`price`,`type`,`weight` AS value_tip FROM {$this->table} WHERE `type`= ?";

        return $this->db->query($sql,[$tip]);
    }

    /**getting an object Furniture
     * @param $tip
     * @return array
     */
    public function getFurnitureId($tip){
        $sql ="SELECT `id`,`sku`,`name`,`price`,`type`, CONCAT( `height`,' x ', `width`,' x ', `length`) AS value_tip FROM {$this->table} WHERE `type`= ?";

        return $this->db->query($sql,[$tip]);
    }


}