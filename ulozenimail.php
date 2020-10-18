<?php
 require('db_connect.php');
 require('authen_login.php');

//start sessiony
session_start();

if (isset($_POST['approval']))
{
// promenne s hodnotami z formulare
    $potvrz = $_POST['approval'];
    $emailul = $_POST['emailp'];
    $rodnecis = $_SESSION['user_sess'];  
    
    //podminka - pokud je vyplneny souhlas a neni vyplneny email
    if ($potvrz == 'yes' and $emailul == "")
    {
        echo "<script type='text/javascript'>alert('V případě souhlasu vyplňte prosím E-mail.');
     window.location.href='mainpage.html';
    </script>";
        
    }
    else
    {
        //vlozeni do databaze - v pripade ze odpovi nesouhlas nebo souhlas s emailem
    $query2 = "UPDATE `user_login` SET email = '$emailul', approval = '$potvrz'  WHERE birthnumber='$rodnecis'";
    $result = mysqli_query($connection, $query2);
    // or die(mysqli_error($connection));
//     overdotaz();

        if ($result) 
        {
            echo "New record created successfully";
            header('Location: confirmation.html');
        }
        else
        {
            echo "Error: " . $query2 . "<br>" . mysqli_error($connection);
        }
    }
    
    
}

// Upozorneni v pripade nevyplneni radio-buttonu
else
{
    echo "<script type='text/javascript'>alert('Vyberte prosím jednu variantu: souhlas či nesouhlas.');
    window.location.href='mainpage.html';
    </script>";
}

// ukonceni sessiony po 15 minutach - 900
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) {
    session_unset();     // smazani promennych
    session_destroy();   // znici data ulozena v souvislosti se sessionou
    header('Location: index.html');
}


?>
