<?php
// overeni vyplneni formulare
    if 
    (!empty($_POST['jmeno']) and !empty($_POST['email']) and !empty($_POST['zprava'])) 
        {
// promene, s hodnotou vlozenou uzivatelem do formulare
        $hlavicka = 'From:' . $_POST['email'] . "\r\n";
        $adresa = 'helenne.bramos@gmail.com';
        $predmet = 'Nová zpráva z kontaktního formuláře Kampaň 007 od: ' . $_POST['jmeno'];
// promena - boolean a jeji overeni
        $uspech = mail($adresa, $predmet, $_POST['zprava'], $hlavicka);
        if ($uspech)
        {
//potvrzeni, ze email byl odeslan
            echo "<script type='text/javascript'>alert('Vaše zpráva byla úspěšně odeslána. Brzy Vám na ni odpovíme.');
            window.location.href='kontakt.html';</script>";
         }
            else
            {
// zprava, ze k odeslani zpravy nedoslo
            echo "<script type='text/javascript'>alert('Ypráva nebyla odeslána. Prosím kontaktujte obchodního zástupce přímo.');
            window.location.href='kontakt.html';</script>";
         }
}
    
    else
    {
//      nektere pole zustalo nevyplneno
        echo "<script type='text/javascript'>alert('Vyplňte prosím všechna pole: jméno, E-mail i text Vaší zprávy.');window.location.href='kontakt.html';
</script>";
    }
?>
