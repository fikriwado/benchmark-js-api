<?php
  require_once __DIR__ . '/vendor/autoload.php';
  require_once __DIR__ . '/functions/config.php';
  require_once __DIR__ . '/functions/model.php';

  if (isset($_POST['submit'])) {
    $volume = (int)$_POST['volume'];
    if (isset($volume) && !empty($volume)) {
      $users = new Users;
      for ($i=0; $i < $volume ; $i++) { 
        $users->Insert();
      }
      echo "Berhasil membuat $volume data";
      header("refresh:5;url=/benchmark-js-api/");
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Generator</title>
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      max-width: 100%;
    }
    body, td { text-align: center; }
    h1 { margin-bottom: 16px; }
    table,
    .card-generator { margin: 0 auto; }
    .card-generator {
      max-width: 450px;
      padding: 50px 0;
      margin-top: 50px;
      background-color: #fbfbfc;
      border: 1px solid #e5e6e8;
    }
    td, button, input { padding: 4px 8px; }
    input { outline: none; }
    button { margin-top: 8px; }
  </style>
</head>
<body>
  <div class="card-generator">
    <h1>Data Generator</h1>
    <div class="form-generator">
      <form action="" method="POST">
        <table>
          <tr>
            <td>Jumlah Data</td>
            <td>:</td>
            <td><input type="number" name="volume"></td>
          </tr>
          <tr>
            <td colspan="3"><button type="submit" name="submit">Generate</button></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</body>
</html>