<?php
    session_start();


    défini session 
    definir superglobales
    definir requete http 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lux/bootstrap.min.css" crossorigin="anonymous">
    <title>Récapitulatif des produits</title>
</head>
<body>
    <?php 
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo"<p>Aucun produit en session</p>";
        }
        else {
            echo"
                <table class='table table-hover'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prix</th>
                            <th>Qantité</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>";
            $totalGeneral = 0;
            foreach($_SESSION['products'] as $index => $product){
                echo"
                <tr>
                    <td>".$index."</td>
                    <td>".$product['name']."</td>
                    <td>".number_format($product['price'], 2, ",","&nbsp;")."&nbsp;€</td>
                    <td>".$product['qtt']."</td>
                    <td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>
                </tr>";
                $totalGeneral += $product['total']; 
            }
            echo"<tr>
                    <td colspan=4>Total général : </td>
                    <td><strong>".number_format($totalGeneral, 2,",","&nbsp;")."&nbsp;€</strong></td>";
            echo"   </tbody>
                <table>";
        }
    ?>
</body>
</html>