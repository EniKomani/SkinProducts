<?php
include_once('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Merr të dhënat e përdoruesit nga baza e të dhënave
    $sql = "SELECT * FROM user WHERE ID=:id";
    $pergatite = $connect->prepare($sql);
    $pergatite->bindParam(':id', $id);
    $pergatite->execute();
    $user = $pergatite->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "Përdoruesi me ID $id nuk u gjet.";
        exit();
    }

    // Përditëso të dhënat e përdoruesit
    if (isset($_POST['submit'])) {
        $name = $_POST['Full_Name'];
        $email = $_POST['Email'];
        $username = $_POST['Username'];
        $role = $_POST['Role'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "UPDATE user SET Full_Name=:name, Email=:email, Username=:username, Role=:role, Password=:password WHERE ID=:id";
        $pergatite = $connect->prepare($sql);
        $pergatite->bindParam(':name', $name);
        $pergatite->bindParam(':email', $email);
        $pergatite->bindParam(':username', $username);
        $pergatite->bindParam(':role', $role);
        $pergatite->bindParam(':password', $password);
        $pergatite->bindParam(':id', $id);

        try {
            $pergatite->execute();
            header("Location: ../PHP/admin.php");
            exit();
        } catch (PDOException $e) {
            echo "Gabim gjatë përditësimit: " . $e->getMessage();
        }
    }
} else {
    echo "ID nuk është e specifikuar.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update User</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style1.css">
</head>
<body>
<div class="container">
    <div class="form-box">
        <form id="passwordform" action="" method="post">
            <br>
            <!-- Full_Name -->
            <input type="text" id="name" name="name" placeholder="Full_Name" value="<?php echo htmlspecialchars($user['Full_Name']); ?>" required>
            <br>
            <!-- Email -->
            <input type="email" id="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($user['Email']); ?>" required>
            <br>
            <!-- Username -->
            <input type="text" id="username" name="username" placeholder="Username" value="<?php echo htmlspecialchars($user['Username']); ?>" required>
            <br>
            <!-- Password -->
            <input type="password" id="password" name="password" placeholder="Create Password" required>
            <br>
            <!-- Confirm Password -->
            <input type="password" id="password1" placeholder="Confirm Password" required>
            <br>
            <!-- Role -->
            <input type="text" id="Role" name="Role" placeholder="Role" value="<?php echo htmlspecialchars($user['Role']); ?>" required>
            <br>
            <!-- Button për të dërguar -->
            <button type="submit" name="submit">Update</button>
            <p id="vendos"></p>
        </form>
        <br>
        <p style="text-align: center;">Already have an account?<a href="loginform.html">Login</a></p>
    </div>
</div>

<script>
    const vendoset = document.getElementById("vendos");
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("password1");
    const passwordform = document.getElementById("passwordform");

    // Regex për fjalëkalimin
    const regexpassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+=\-\\[\];,./]).{8,}$/;

    // Validimi gjatë shkrimit të fjalëkalimit
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

    // Validimi gjatë dorëzimit të formës
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
