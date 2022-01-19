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
    }
