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
  <body style="background-image: url('zavesa.jpeg'); background-repeat: no-repeat; background-position: center;background-size: cover;">
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
    <div class="container" >
      <div class="row" >
        <div class="col-md-12 mt-5">
          <h1 class="text-center" style="color: #ffcc99">Dodavanje nove predstave</h1>
          <hr style="height: 12px;background-color: #ffcc99; width: 43%; margin-left:320px;">
        </div>
      </div>
      <div class <div class="row">
        <div class="col-md-5 mx-auto">
          <?php

              include 'model.php';
              $model = new Model();
              $insert = $model->insert();

          ?>
          <form name="form1"action="" method="post">
              <div class="form-group" style="color: #ffffcc; font-weight:bold;">
              <label for="pozoriste">Pozoriste</label>
              <select class="form-control" id="pozoriste" name="pozoriste"> 
              <?php
              $conn=$model->vrati();
              $upit="SELECT * FROM pozoriste";
              $pozoriste=$conn->query($upit);?>
              
              <option disabled selected value>Odaberite pozoriste</option>
              <?php
              if(!empty($_POST['pozoriste'])) {
              while($red=$pozoriste->fetch_object()){?>
              <option <?php if($_POST['pozoriste']==$red->id){echo("selected");}?> value='<?php echo $red->id; ?>' >
              <?php echo $red->naziv; ?></option>
              <?php
              }}else{
                while($red=$pozoriste->fetch_object()){?>
              <option value='<?php echo $red->id; ?>'>
              <?php echo $red->naziv; ?></option>
              <?php
              }}
              ?>
            
              </select>
            </div class="form-group" style="color: #ffffcc; font-weight:bold;">
              <label for="">Naziv predstave</label>
              <input type="text" name="naziv" class="form-control">
            </div>
            <div class="form-group" style="color:#ffffcc; font-weight:bold;">
              <label for="">Zanr</label>
              <input type="text" name="zanr" class="form-control">
            </div>
            <div class="form-group" style="color: #ffffcc; font-weight:bold;">
              <label for="">Broj raspolozivih mesta</label>
              <input type="text" name="mesta" class="form-control"> 
            </div>
            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-primary" onclick="allnumeric(document.form1.mesta)"style="background-color:  #ffcc99; font-weight:bold; border-color: #cc3300;">Dodaj</button>
            </div>
          </form>
        </div>
      </div>
    </div>