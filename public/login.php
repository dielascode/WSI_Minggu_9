<?php 
require_once "../config/koneksi.php";
require_once '../class/auth.php';

$db = new Database();
$conn = $db->getConnection();
$auth = new Auth($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($auth->login($email, $password)) {
        header("Location: ../public/admin/dist/index.php");
        session_regenerate_id(true);
        $_SESSION['login'] = true;
    }else{
        $error = "Username atau password salah!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="card shadow-sm" style="width: 100%; max-width: 400px;">
        <div class="card-body p-4">
            <h3 class="card-title text-center mb-4">Login</h3>
            <?php  if(isset($error)) : ?>
                <p style="color:red"><?php echo $error?></p>
            <?php  endif; ?>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" id="email" class="form-control" placeholder="name@example.com" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2">
                    Sign In
                </button>
            </form>

            <div class="text-center mt-3">
                <small class="text-muted">Don't have an account? <a href="register.php" class="text-decoration-none">Register</a></small>
            </div>
        </div>
    </div>

</body>

</html>