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
        <td>
        <div class="form-group text-right" style="color:  #ffcc99; font-weight: bold;margin-top:120px;">
        <button type="submit" id = "btn" name="submit" class="btn btn-primary" style="background-color:  #ffcc99; font-weight:bold; border-color: #cc3300; margin-right:50px; color:#cc3300;">Nadjite adresu</button>
        <p id="div1" style = "margin-right:50px;"></p> 
        </div>
        <div class="text-right" style="color: #ffcc99; margin-right:50px; font-weight:bold;margin-left:50px;"><p>Ne znate gde je pozoriste?</p></div>             
        </div>
        </td>
        
        </tr>
        </table>
      </div>
    </div>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <!-- Za ucitavanje adresa -->
    <script>
        $(document).ready(function(){
        $("button").click(function(){
        $("#div1").load("adrese.txt");
           });
          });
    </script>     
    <!-- Za pretragu pozorista -->
    <script>
          function showHint(str) {
          var xhttp;
          if (str.length == 0) { 
            document.getElementById("txtHint").innerHTML = "";
            return;
          }
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("txtHint").innerHTML = this.responseText;
            }
          };
          xhttp.open("GET", "gethint.php?q="+str, true);
          xhttp.send();   
        }
    </script>
    <!-- //NOVO PRETRAGA PO TABELAMA-->
            <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
</script>
  </body>
</html>