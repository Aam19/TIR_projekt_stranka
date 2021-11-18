<?php 
	include 'hlavickaAdmin.php';
	include 'navbarAdmin.php';
	include 'pataAdmin.php';

	session_start();

   /* if(isset($_SESSION['prihlaseny'])) {
        header('Location: prihlaseny.php');
        exit();
    }*/
?>
<?php 
$servername = "localhost";
$username = "Adam";
$password = "KqRjijItFqPXql2t";
$db = "uzivatelia2021";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $user = $_POST['email_address'];
        $heslo = md5($_POST['password']);
        $sql = 'SELECT * FROM uzivatelia WHERE login="'.$user.'" AND heslo="'.$heslo.'"';
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "id: " . $row["id"]. " - Name: " . $row["login"]. " " . $row["heslo"]. "<br>";
              $_SESSION["rola"] = $row["rola"];
            }
            session_start();
              $_SESSION["user"] = $user;
              header('Location: index.php');
          }

        
            $_SESSION['prihlaseny'] = 1;
            header('Location: prihlaseny.php');
            exit();
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
 <strong> Výborne si prihlásený </strong> <?php echo "" ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php
        
        if (!$prihlasenie[$_POST['email-address']])
        {
            ?>//uzivatel neexistuje
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
 <strong> Ups! </strong> <?php echo $chyba; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php
        }
        else{
            echo "0 results";
          }
    }
 ?>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center" ><h4>Prihlásenie</h4></div>
                    <div class="card-body">
                        <form action="index.php" method="POST">
                            <div class="form-group row was-validated">
                                <small id="emailHelp" class="form-text text-dark mb-2" ><b>Meno</b></small>
                                <div class="col-lg-12 input-container">
                                   
                                    <input type="text" id="email_address" class="form-control" name="email-address" required pattern="\S.{2,9}.[^()/><\][,;*_|]+"> 
                                    
                                    <div class="invalid-feedback">
                                      Prosím zadaj meno
                                    </div>
                                </div>
                               
                            </div>

                            <div class="form-group row was-validated">
                                 <small id="emailHelp" class="form-text text-dark mb-2"><b>Heslo</b></small>
                                <div class="col-lg-12">
                                    <input type="password" id="password" class="form-control" name="password" required pattern="(?=.*\d).{5,}" >
                                    <div class="invalid-feedback">
                                      Prosím zadaj heslo (Musí obsahovať najmenej 5 znakov.)
                                    </div>
                                </div>
                                
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Pamätať prihlásenie
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center"> 
                                <button type="submit" class="btn btn-light mb-4">
                                    Prihlásiť sa
                                </button>
                                <br>
                                <a href="#" class="text-secondary">
                                    <small>Zaregistruj sa</small>
                                </a>
                                <br>
                                <a href="#" class="text-secondary">
                                    <small>Zabudol som heslo</small>
                                </a>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
