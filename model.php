<?php 

	class Model{

		private $server = "localhost";
		private $username = "root";
		private $password;
		private $db = "bazapoz";
		private $conn;

		public function __construct(){
			try {
				
				$this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
			} catch (Exception $e) {
				echo "connection failed" . $e->getMessage();
			}
		}
		public function vrati(){
			return $this->conn;
		}
		public function insert(){

			if (isset($_POST['submit'])) {
				if (isset($_POST['pozoriste']) && isset($_POST['naziv']) && isset($_POST['zanr']) && isset($_POST['mesta'])) {
					if (!empty($_POST['pozoriste']) && !empty($_POST['naziv']) && !empty($_POST['zanr']) && !empty($_POST['mesta']) && is_numeric($_POST['mesta']) ) {
						
						$pozoriste = $_POST['pozoriste'];
						$naziv = $_POST['naziv'];
						$zanr = $_POST['zanr'];
						$mesta = $_POST['mesta'];

						$query = "INSERT INTO predstave (pozoriste,naziv,zanr,mesta) VALUES ('$pozoriste','$naziv','$zanr','$mesta')";
						if ($sql = $this->conn->query($query)) {
							echo "<script>alert('Uspesno ste dodali novu predstavu!');</script>";
							echo "<script>window.location.href = 'index.php';</script>";
						}else{
							echo "<script>alert('Neuspesno dodavanje');</script>";
							echo "<script>window.location.href = 'index.php';</script>";
						}

					}else{
						echo "<script>alert('Unesite sve u odgovarajucem formatu!');</script>";
						echo "<script>window.location.href = 'index.php';</script>";
					}
				}
			}
		}
    
    

// Koristim za predstave
public function fetch(){
    $data = null;

    $query="select p.id,p.pozoriste,p.naziv,p.zanr, p.mesta, poz.naziv as NazivPozorista from predstave p join pozoriste poz on p.pozoriste=poz.id";
    if ($sql = $this->conn->query($query)) {
        while ($row = mysqli_fetch_assoc($sql)) {
            $data[] = $row;
        }
    }
    return $data;
}

public function delete($id){

    $query = "DELETE FROM predstave where id = '$id'";
    if ($sql = $this->conn->query($query)) {
        return true;
    }else{
        return false;
    }
}

// Koristim za read
public function fetch_single($id){

    $data = null;

    $query="select p.id,p.pozoriste,p.naziv,p.zanr, p.mesta, poz.naziv as NazivPozorista from predstave p join pozoriste poz on p.pozoriste=poz.id
        WHERE p.id ='$id'";
    if ($sql = $this->conn->query($query)) {
        while ($row = $sql->fetch_assoc()) {
            $data = $row;
        }
    }
    return $data;
}
//Koristim za edit
public function edit($id){

    $data = null;

    $query = "SELECT * FROM predstave WHERE id = '$id'";
    if ($sql = $this->conn->query($query)) {
        while($row = $sql->fetch_assoc()){
            $data = $row;
        }
    }
    return $data;
}
//Koristim kod edit isto
public function update($data){

    $query = "UPDATE predstave SET pozoriste='$data[pozoriste]', naziv='$data[naziv]', zanr='$data[zanr]', mesta='$data[mesta]' WHERE id='$data[id] '";

    if ($sql = $this->conn->query($query)) {
        return true;
    }else{
        return false;
    }
}
}
?>