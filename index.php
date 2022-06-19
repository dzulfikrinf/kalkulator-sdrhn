<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kalkulator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    
  <?php
  $b1 =[1, 2, 3, '+', 4, 5, 6, '-', 7, 8, 9, '*', 0, '.', '/', '='];
  $b2 =['C'];
  $tombol = '';

  if(isset($_POST['tombol']) && in_array($_POST['tombol'], $b1)){
    $tombol=$_POST['tombol'];
  }
  $hitungan = '';
  if(isset($_POST['hitungan']) && preg_match('~^(?:[\d.]+[* /+-]?)+$~', $_POST['hitungan'],$out)){
    $hitungan=$out[0];
  }
  $tampilan = $hitungan.$tombol;
  if($tombol=='C'){
    $tampilan='';
  }elseif($tombol=='=' && preg_match('~^\d*\.?\d+(?:[*/+-]\d*\.?\d+)*$~',$hitungan)){
    $tampilan.=eval("return $hitungan;");
  }

  echo "<div class='justify-content-center'>";

  echo "<div class='calc'>";
  echo "<form method='POST'>";
    echo "<div class='card'>";
      echo "<div class='card-body'>";
        echo "<input class='form-control input type='text' name='hitungan' value='$tampilan' placeholder='0'>";
        echo "<div class='card-number'>";

        foreach(array_chunk($b1,4) as $chunk){
          foreach ($chunk as $button) {
            echo "<button ",(sizeof($chunk)!=4?" ":""), "name='tombol' value='$button' class='btn btn-primary butn'>$button</button>";
          }
        }

        foreach ($b2 as $clear) {
          echo "<button name='tombol' value='$clear' class='btn btn-primary butn-clear'>$clear</button>";
        }
        echo "</div>";
      echo "</div>";
    echo "</div>";
  echo "</div>";
  echo "</form>";

  echo "</div>";
  ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>