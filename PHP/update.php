<?php

include_once('config.php');

    if(isset($_GET['id'])){
        
        $id = $_GET['id'];

        $sql = "SELECT * FROM USER WHERE Id=:id";
        $pergatite = $connect->prepare($sql);
        $pergatite->bindParam(':id', $id);
        $pergatite->execute();
        $user = $pergatite->fetch(PDO::FETCH_ASSOC);

        if(!$user){
            echo "Perdoruesi me ID $id nuk u gjet.";
            exit();
        }

        if(isset($_POST['submit'])){
            $name = $_POST['Emri'];
            $email = $_POST['Email'];
            $username = $_POST['Username'];
            $role = $_POST['Role'];
            $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

            $sql = "UPDATE user SET Full_name=:name, Email=:email, Username=:username, Role=:role, Password=:password WHERE Id=:id";
            $pergatite = $connect->prepare($sql);
            $pergatite = $connect->prepare($sql);
            $pergatite->bindParam(':name', $name);
            $pergatite->bindParam(':email', $email);
            $pergatite->bindParam(':username', $username);
            $pergatite->bindParam(':role', $role);
            $pergatite->bindParam(':password', $password);
            $pergatite->bindParam(':id', $id);

            try{
                $pergatite->execute();
                header("Location: ../htmlphp/Dashboard.php");
                exit();
            } catch (PDOException $e)    {
                echo "Gabim gjate perditesimit: " . $e->getMessage();
            }
        }
    }else {
            echo "ID nuk eshte e specifikuar.";
            exit();
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style1.css">
    <style>
        body{
            background-image:url("../img/foto1..jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="form-box">
        <form id="passwordform" action="update.php?id=<?php echo $user['Id']; ?>" method="post">
                <br>
                <input type="text" id="name" name="Emri" value="<?php echo htmlspecialchars($user['Full_name']); ?>" placeholder="Full_Name"required>
                <input type="email" id="email" name="Email" value="<?php echo htmlspecialchars($user['Email']); ?>" placeholder=" Email" required>
                <br>
                <input type="text" id="username" name="Username" value="<?php echo htmlspecialchars($user['Username']); ?>" placeholder="Username"required>
                <input type="password" id="password" name="Password" placeholder="Create Password"required>
                <br>
                <input type="password" id="password1" placeholder="Confirm Password"required>
                <br>
                <input type="text" id="Role" name="Role" value="<?php echo htmlspecialchars($user['Role']); ?>" placeholder="Role"required>
                <br>
                
                <button type="submit" name="submit" value="Update">Update</button>
                <p id="vendos"></p>
              
        </form>
        <br>
                <p style="text-align: center;">Already have an account?<a href="loginform.html">Login</a></p>
        </div>
 <script>
       
        const vendoset = document.getElementById("vendos");
        const passwordInput = document.getElementById("password");
        const confirmPasswordInput = document.getElementById("password1");
        const passwordform = document.getElementById("passwordform");
        
     
        const regexpassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+=\-\\[\];,./]).{8,}$/;
        
      
        passwordInput.addEventListener("input", () => {
            const passwordValue = passwordInput.value;
        
           
            if (regexpassword.test(passwordValue)) {
                vendoset.innerText = "Password-i është i vlefshëm.";
                vendoset.style.color = "green";
            } else {
                vendoset.innerText =
                    "Password duhet të përmbajë të paktën:\n- Një shkronjë të madhe\n- Një shkronjë të vogël\n- Një numër\n- Një simbol\n- Minimumi 8 karaktere.";
                vendoset.style.color = "red";
            }
        });
        
       
        passwordform.addEventListener("submit", (ndrysho) => {
            const createPassword = passwordInput.value.trim();
            const confirmPassword = confirmPasswordInput.value.trim();
        
           
            if (regexpassword.test(createPassword)) {
                if (createPassword === confirmPassword) {
                    vendoset.innerText = "Password-i u shënua me sukses.";
                    vendoset.style.color = "green";
                } else {
                    ndrysho.preventDefault();
                    vendoset.innerText = "Password-et nuk përputhen.";
                    vendoset.style.color = "red";
                }
            } else {
                ndrysho.preventDefault();
                vendoset.innerText = "Password-i nuk përmbush kriteret e kërkuara.";
                vendoset.style.color = "red";
            }
        });
        </script>
        
</body>
</html>