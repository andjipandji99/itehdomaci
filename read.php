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
  <body style="background-image: url('zavesa.jpg'); background-repeat: no-repeat; background-position: center;background-size: cover;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <h1 class="text-center" style="color: #ffcc99">Azuriranje podataka o predstavi</h1>
          <hr style="height: 12px;background-color: #ffcc99; width: 52%;">
        </div>
      </div>
      <div class="row">
        <div class="col-md-5 mx-auto">
          <?php

              include 'model.php';
              $model = new Model();
              $id = $_REQUEST['id'];
              $row = $model->edit($id);

              if (isset($_POST['update'])) {
                if (isset($_POST['pozoriste']) && isset($_POST['naziv']) && isset($_POST['zanr']) && isset($_POST['mesta'])) {
                  if (!empty($_POST['pozoriste']) && !empty($_POST['naziv']) && !empty($_POST['zanr']) && !empty($_POST['mesta']) ) {
                    
                    $data['id'] = $id;
                    $data['pozoriste'] = $_POST['pozoriste'];
                    $data['naziv'] = $_POST['naziv'];
                    $data['zanr'] = $_POST['zanr'];
                    $data['mesta'] = $_POST['mesta'];

                    $update = $model->update($data);

                    if($update){
                      echo "<script>alert('Uspesno ste azurirali podatke o predstavi!');</script>";
                      echo "<script>window.location.href = 'predstave.php';</script>";
                    }else{
                      echo "<script>alert('Neuspesno azuriranje podataka o predstavi');</script>";
                      echo "<script>window.location.href = 'predstave.php';</script>";
                    }

                  }else{
                    echo "<script>alert('Molimo Vas da popunite sva polja!');</script>";
                    header("Location: edit.php?id=$id");
                  }
                }
              }

          ?>
          <form action="" method="post">
            
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
              ?>
              </select>
            </div> 
            <div class="form-group"  style="color: #ffffcc; font-weight:bold;">
              <label for="">Naziv predstave</label>
              <input type="text" name="naziv" value="<?php echo $row['naziv']; ?>" class="form-control">
            </div>
            <div class="form-group"  style="color: #ffffcc; font-weight:bold;">
              <label for="">Zanr</label>
              <input type="text" name="zanr" value="<?php echo $row['zanr']; ?>" class="form-control">
            </div>
            <div class="form-group"  style="color: #ffffcc; font-weight:bold;">
              <label for="">Broj raspolozivih mesta</label>
              <input type="text" name="mesta" value="<?php echo $row['mesta']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <button type="submit" name="update" class="btn btn-primary"  style="background-color: #ffcc99; font-weight:bold; border-color: #cc3300;">Azuriraj podatke</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>