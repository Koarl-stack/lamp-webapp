<?php
 require('db_connect.php');

//start sessiony
session_start();
// echo session_id();
if (isset($_POST['birth_num']) and isset($_POST['code_num'])){

// promenne s hodnotami z formulare
$rodnecislo = $_POST['birth_num'];
$zaslkod = $_POST['code_num'];
$hashkod = md5($zaslkod);

//sql dotaz pro overeni prihlasovacich udaju
$query = "SELECT * FROM `user_login` WHERE birthnumber='$rodnecislo' and codenumber='$hashkod'";

$result = mysqli_query($connection, $query);
// or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){
// definovani globalni promenne
$_SESSION['user_sess'] = $rodnecislo;
$_SESSION['last_activity'] = time();

// presmerovani na dalsi stranku
header('Location: mainpage.html');

}
//Upozorneni na neplatne udaje
else{
echo "<script type='text/javascript'>alert('Neplatné přihlašovací údaje');
window.location.href='index.html';
</script>";

}
}
?>
