<?php
  namespace App\Models;

  class News extends Model {
    protected $table = 'news';

    public function show($fields = ['*'], $offset, $limit) {
      $fields = implode(',', $fields);
      $sql = "SELECT {$fields} FROM {$this->table} limit $offset,$limit";
      $stmt = static::$db->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function insert($name,$preview){
      $sql = "INSERT INTO {$this->table}(name,preview) VALUES ('$name','$preview')";
      $stmt = static::$db->prepare($sql);
      return $stmt->execute();
    }

    public function update($name,$preview,$id){
      $sql = "UPDATE {$this->table} SET name = '$name', preview = '$preview' 
              where id = '$id';";
      $stmt = static::$db->prepare($sql);
      return $stmt->execute();
    }

    public function delete($id){
      $sql = "delete from {$this->table} where id = '$id'";
      $stmt = static::$db->prepare($sql);
      return $stmt->execute();
    }

    public function row(){
      $sql = "select count(id) from {$this->table}";
      $stmt = static::$db->prepare($sql);
      $stmt->execute();
      $row = $stmt->fetchColumn();
      return $row;
    }

  }