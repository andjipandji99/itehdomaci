<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Pozorisne predstave</title>
  </head>
  <body  style="background-image: url('maske.jpg'); background-repeat: no-repeat; background-position: center; background-size: cover;">
    <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" href="index.php">Dodavanje</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="predstave.php">Predstave</a>
  </li> 
</ul>
</div>
</nav>
    <div class="container">
      <div class="row" >
        <div class="col-md-12 mt-5">
          <h1 class="text-left" style="color: #ffcc99;">PREDSTAVE</h1>
          <hr style="height: 12px;background-color:  #ffcc99; width: 19%; margin-bottom:80px; margin-left:0px;">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table" style="color: #ffffcc">
            <thead>
              <tr>
                <th>ID</th>
                <th>Pozoriste</th>
                <th>Naziv predstave</th>
                <th>Zanr</th>
                <th>Broj raspolozivih mesta</th>
                <th></th>
              </tr>
            </thead>
            <tbody id="myTable">
            <!-- Pretraga tabele -->
            <p style="color: #ffcc99; margin-right:50px; font-weight:bold;">Pretrazite predstave po nazivima ili po zanru:</p>  
            <input id="myInput" type="text" placeholder="Search..">
            <br>
            <br>
              <?php

                include 'model.php';
                $model = new Model();
                $rows = $model->fetch();
                $i = 1;
                if(!empty($rows)){
                  foreach($rows as $row){ 
              ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['NazivPozorista']; ?></td>
                <td><?php echo $row['naziv']; ?></td>
                <td><?php echo $row['zanr']; ?></td>
                <td><?php echo $row['mesta']; ?></td>
                <td>
                  <a href="read.php?id=<?php echo $row['id']; ?>" class="badge badge-primary">Pogledaj</a>
                  <a href="delete.php?id=<?php echo $row['id']; ?>" class="badge badge-warning">Izbrisi</a>
                  <a href="edit.php?id=<?php echo $row['id']; ?>" class="badge badge-success">Izmeni</a>
                </td>
              </tr>
              

              <?php
                  }
              }else{
                echo "Nema podataka o predstavama"; //ako nemam nijednu predstavu u bazi
            }

              ?>
            </tbody>
          </table>
        </div>
        <table style="width:100%;">
        <tr">
        <td>
        <!-- Pretraga pozorista autocomplete -->
        <div style="color:  #ffcc99; font-weight: bold; margin-top:160px;">
            <div class="form-group">
              <button type="submit" id = "btn" name="submit" class="btn btn-primary" style="background-color:  #ffcc99; font-weight:bold; border-color: #cc3300; color:#cc3300; margin-bottom: 10px;">Pretrazite pozorista:</button>
              <br>            
                <p>Predlog: <span id="txtHint"></span></p> 
                <p>Pozoriste: <input type="text" id="txt1" onkeyup="showHint(this.value)"></p>
            </div>
        </div>
        </td>
     