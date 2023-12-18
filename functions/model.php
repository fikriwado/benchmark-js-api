<?php
require_once __DIR__ . '/config.php';

class Users
{
  function Insert()
  {
    $db = new Connect();
    $faker = Faker\Factory::create('id_ID');
    $name = $faker->name();
    $email = str_replace(' ', '.', strtolower($name)) . '@gmail.com';    
    $data = $db->prepare('INSERT INTO users (name, email) VALUES (?,?)');
    $data->execute([$name, $email]);
    return $db->lastInsertId();
  }
  
  function Select($limit = 0)
  {
    $db = new Connect();
    $users = [];
    $data = $db->prepare('SELECT name, email FROM users ORDER BY rand() LIMIT ' . $limit);
    $data->execute();
    while ($result = $data->fetch(PDO::FETCH_OBJ)) {
      $users[] = $result;
    }
    return json_encode($users);
  }
}