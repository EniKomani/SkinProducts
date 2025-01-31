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
    <style>
        /* Stil për të qendruar lista e përdoruesve në qendër të majtë */
        #userContainer {
            display: flex;
            justify-content: flex-start; 
            align-items: center;  
            height: 100vh;  
            width: 100%;
            margin-left: 10%; 
        }

        table {
            border-collapse: collapse;
            width: 80%;  
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    
    <div style="display: flex; height: 100vh;"> 
        <div class="sidebar_main">
            <img src="../img/dashboard.webp" alt=""/>
            <div class="dash_emri">
                <h3>Jola-Eni</h3> 
            </div>
            <div class="dash_emri2">
                <h3 id="product">Product</h3>
                <h3 id="user">User</h3>
                <h3 id="contact">Product_Accesories</h3>
                <h3><a href="Home.php">Website</a></h3>
            </div>   
        </div>
    
            <div style="flex: 1; display: flex; justify-content: center; align-items: center;">
    
    <div class="container3" id="container3">
        <div class="form-box3" id="form-box3">
            <form id="loginForm" action="../PHP/add_Accesories.php" method="post" enctype="multipart/form-data">
                <label for="name">Emri</label>
                <input type="text" id="name" name="name" placeholder="Enter name"/>
                <br>               
                <label for="img">Cmimi</label>
                <input type="text" id="img" name="type" placeholder="Cmimi"/>
                <br>
                <label for="image">Ngarko Imazh:</label>
                <input type="file" name="image" id="image" accept="image/*" required/>
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
    </div>

    <div id="productContainer1" style="display: none;">
        <div class="table-container1">
            <h2>Lista e Produkteve</h2>
            <table border="1px">
                <tr>
                    <th>ID</th>
                    <th>Emri</th>
                    <th>Tipi</th>
                    <th>Imazhi</th>
                    <th>Admini</th>
                    <th>Fshi</th>
                </tr>
                <?php
                    $stmt = $conn->prepare("SELECT * FROM product_accesories");
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($product = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$product['id']}</td>";
                            echo "<td>{$product['name']}</td>";
                            echo "<td>{$product['type']}</td>";
                            echo "<td><img src='{$product['image_path']}' alt='Product Image' width='50'></td>";
                            echo "<td>{$product['admin_name']}</td>";
                            echo "<td><a href='../PHP/delete_Accesories.php?id={$product['id']}'>Fshi</a></td>";
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
    </div> 




        

        <div style="flex: 1; display: flex; justify-content: center; align-items: center;">
   
            <div class="container2" id="container2">
                <div class="form-box2" id="form-box2">
                    <form id="loginForm" action="../PHP/add_Product.php" method="post" enctype="multipart/form-data">
                        <label for="name">Emri</label>
                        <input type="text" id="name" name="name" placeholder="Enter name"/>
                        <br>               
                        <label for="img">Cmimi</label>
                        <input type="text" id="img" name="type" placeholder="Cmimi"/>
                        <br>
                        <label for="image">Ngarko Imazh:</label>
                        <input type="file" name="image" id="image" accept="image/*" required/>
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
            </div>

            <div id="productContainer" style="display: none;">
                <div class="table-container">
                    <h2>Lista e Produkteve</h2>
                    <table border="1px">
                        <tr>
                            <th>ID</th>
                            <th>Emri</th>
                            <th>Tipi</th>
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
        </div> 

        <div id="userContainer">
            <table border="1">
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
                    if(count($users) > 0){
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
                    } else {
                        echo "<tr><td colspan='7'>Nuk ka përdorues.</td></tr>";
                    }
                ?>
            </table>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        let product = document.getElementById("product");
        let user = document.getElementById("user");
        let contact = document.getElementById("contact");

        let container = document.getElementById("container2");
        let productContainer = document.getElementById("productContainer");
        let userContainer = document.getElementById("userContainer");
        let formBox = document.getElementById("form-box2");
        let productContainer1 = document.getElementById("productContainer1");
        let formBox3 = document.getElementById("form-box3");
        let container3 = document.getElementById("container3");

        let lastSection = localStorage.getItem("lastSection") || "user"; // Default: user

        function showSection(section) {
            if (section === "product") {
                productContainer.style.display = "block";
                userContainer.style.display = "none";
                formBox.style.display = "block";
                container.style.display = "block";
                productContainer1.style.display = "none";
                formBox3.style.display = "none";
                container3.style.display = "none";

            } else if (section === "user") {
                productContainer.style.display = "none";
                userContainer.style.display = "flex";
                formBox.style.display = "none";
                container.style.display = "none";
                productContainer1.style.display = "none";
                formBox3.style.display = "none";
                container3.style.display = "none";

            } else{
                productContainer.style.display = "none";
                userContainer.style.display = "none";
                formBox.style.display = "none";
                container.style.display = "none";
                productContainer1.style.display = "block";
                formBox3.style.display = "block";
                container3.style.display = "block";
            }
        }

        showSection(lastSection);

        product.addEventListener("click", function () {
            localStorage.setItem("lastSection", "product");
            showSection("product");
        });

        user.addEventListener("click", function() {
            localStorage.setItem("lastSection", "user");
            showSection("user");
        });

        contact.addEventListener("click", function() {
            localStorage.setItem("lastSection", "contact");
            showSection("contact");
        });
    });
    </script>

</body>
</html>
