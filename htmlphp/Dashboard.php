<?php
   
   session_start();
   
   if ($_SESSION['role'] !== 'Admin') {
    header("Location: ../htmlphp/Home.php");
    exit();
   }


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

       <div class="container2">
        <div class="form-box2">
            <form id="loginForm" action="../PHP/add_Product.php"  method="post", enctype="multipart/form-data">
                <label for="name">Emri</label>
                <input type="text" id="name" name="name" placeholder="Enter name">
                <br>               
                <label for="modeli">Modeli</label>
                <input type="text" id="model" name="model" placeholder="Modeli">
                 <br>
                <label for="img">Tipi</label>
                <input type="text" id="img" name="type" placeholder="Tipi">
                <br>
                <label for="image">Ngarko Imazh:</label>
                <input type="file" name="image" id="image" accept="image/*" required>
                <br>
                <label for="admin_name">Admini:</label>
                <select name="admin_name" id="admin_name" required>
                <option value="">Zgjidh Adminin</option>
                <?php
                    $sql = "SELECT * FROM user WHERE role = 'Admin'";
                    $getAdmins = $connect->prepare($sql);
                    $getAdmins->execute();
                    $admins = $getAdmins->fetchAll();

                    foreach ($admins as $admin) {
                        echo "<option value='{$admin['Username']}'>{$admin['Emri']} ({$admin['Username']})</option>";
                    }
                ?>
                </select>
                <button type="submit">Shto Produkt</button>
            </form>
            <br>
        </div>
        
        <div>
            <h2>Lista e Produkteve</h2>
            <table border="1px">
                <tr>
                    <th>ID</th>
                    <th>Emri</th>
                    <th>Tipi</th>
                    <th>Modeli</th>
                    <th>Imazhi</th>
                    <th>Admini</th>
                    <th>Fshi</th>
                </tr>
                <?php

                    $stmt = $conn->prepare("SELECT * FROM products");
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($product = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$product['id']}</td>";
                            echo "<td>{$product['name']}</td>";
                            echo "<td>{$product['type']}</td>";
                            echo "<td>{$product['model']}</td>";
                            echo "<td><img src='{$product['image_path']}' alt='Product Image' width='50'></td>";
                            echo "<td>{$product['admin_name']}</td>";
                            echo "<td><a href='../PHP/delete_product.php?id={$product['id']}'>Fshi</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Nuk ka produkte.</td></tr>";
                    }

                    $stmt->close();
                ?>
            </table>
        </div>
    </div> 

        <table id="tabela" style="display: none;" border="1">
            <tr>
                <td>ID</td>
                <td>Full name</td>
                <td>Email</td>
                <td>User</td>
                <td>Roli</td>
                <td>Delete</td>
                <td>Update</td>
                
            </tr>
                <?php
                if(count($users)>0){
                    foreach($users as $user ){
                            echo "<tr>";
                            echo"<td> {$user['Id']}</td>";
                            echo"<td> {$user['Full_name']}</td>";
                            echo"<td> {$user['Email']}</td>";
                            echo"<td> {$user['Username']}</td>";
                            echo"<td> {$user['Role']}</td>";
                            echo"<td><a href='../PHP/delete.php?id={$user['Id']}'>Delete</a></td>";
                            echo"<td><a href='../PHP/update.php?id={$user['Id']}'>Update</a></td>";
                            echo "</tr>";
                    }
                    }
                        else{
                        echo "<tr><td> Nuk ka perdorues</td></tr>";
                    }

            ?>

                


                
        </table>


        <table id="tabela1" style="display: none;" border="1">
             <td>ID</td>
             <td>Name</td>
             <td>Type</td>
             <td>Delete Img</td>
             <td>Update Img</td>
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
        let tabela = document.getElementById("tabela1");
        let formBox = document.querySelector(".form-box2"); 

        // Shto event listener për klikim në "Product"
        product.addEventListener("click", function () {
            table.style.display = "none";  // Fsheh tabelën për përdorues
            tabela.style.display = "block";  // Shfaq tabelën për produktet
            formBox.style.display = "block";  // Shfaq formularin
        });

        // Shto event listener për klikim në "User"
        user.addEventListener("click", function(){
            table.style.display = "block";  // Shfaq tabelën për përdorues
            tabela.style.display = "none";  // Fsheh tabelën për produktet
            formBox.style.display = "none";  // Fsheh formularin
        });

        // Shto event listener për klikim në "Contact us"
        contact.addEventListener("click",function(){
            table.style.display = "none";  // Fsheh tabelën për përdorues
            tabela.style.display = "none";  // Fsheh tabelën për produktet
            formBox.style.display = "none";  // Fsheh formularin
        });

        // Eventet për tabelat dhe elementët e tjerë
        product.addEventListener("click", function(){
            tabela.style.display = "block";
        });

        user.addEventListener("click", function(){
            tabela.style.display = "none";
        });

        contact.addEventListener("click", function(){
            tabela.style.display = "none";
        });
    });
</script>

</body>
</html>
