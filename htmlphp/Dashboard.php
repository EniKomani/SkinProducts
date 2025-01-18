<?php
    include_once('../PHP/config.php');
    $sql="SELECT * FROM user";
    $getusers=$connect->prepare($sql);
    $getusers->execute();
    $users=$getusers->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
   
    <div style="display:flex; height: 100vh;">
        <div class="sidebar_main">
           <img src="../img/dashboard.webp" alt="">
           <div class="dash_emri">
              <h3>Jola-Eni</h3> 
           </div>
              <div class="dash_emri2">
                <h3 id="product">Product</h3>
                <h3 id="user">User</h3>
                <h3 id="contact">Contact us</h3>
            </div>          
        </div>
       <div style="flex: 1; display: flex; justify-content: center; align-items: center;">
        <table id="tabela" style="display: none;" border="1">
            <tr>
                <td>ID</td>
                <td>Full name</td>
                <td>Email</td>
                <td>User</td>
                <td>Roli</td>
                
            </tr>
                <?php
            
                    foreach($users as $user ){
                        echo "<tr>";
                        echo"<td> {$user['Id']}</td>";
                        echo"<td> {$user['Full_name']}</td>";
                        echo"<td> {$user['Email']}</td>";
                        echo"<td> {$user['Username']}</td>";
                        echo"<td> {$user['Role']}</td>";
                        echo "</tr>";
                    }

                


                ?>
        </table>


        <table id="tabela1" style="display: none;" border="1">
             <td>ID</td>
             <td>Type</td>
             <td>Model</td>
             <td>Name</td>
             <td>Person ID</td>
        </table>
       </div>

       <table id="tabela2" style="display: none;" border="1">
           <td></td>
           
       </table>
    
    </div>
       


        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let product = document.getElementById("product");
                let table = document.getElementById("tabela");
                let tabela=document.getElementById("tabela1");


                // Shto event listener për klikim
                product.addEventListener("click", function () {
                    table.style.display = "none"; // Shfaq tabelën kur klikoni "Product"
                });
                user.addEventListener("click", function(){
                    table.style.display="block";
                });
                contact.addEventListener("click",function(){
                    table.style.display="none";
                });
                 
                product.addEventListener("click", function(){
                tabela.style.display="block";
                });

                user.addEventListener("click", function(){
                    tabela.style.display="none";
                });

                contact.addEventListener("click", function(){
                    tabela.style.display="none";
                });

            });

                

        </script>
</body>
</html>
