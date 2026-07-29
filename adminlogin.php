<!DOCTYPE html>
<html lang="mr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Login</title>

<link rel="stylesheet" href="adminlogin.css">

<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="login-box">

<div class="login-icon">

<i class="fa-solid fa-user-shield"></i>

</div>

<h2>प्रशासक लॉगिन</h2>

<p>कृपया लॉगिन करा</p>

<form action="adminlogin_process.php" method="POST">

<div class="input-box">

<i class="fa-solid fa-user"></i>

<input
type="text"
name="username"
placeholder="Username"
required>

</div>

<div class="input-box">

<i class="fa-solid fa-lock"></i>

<input
type="password"
name="password"
placeholder="Password"
required>

</div>

<button type="submit">

<i class="fa-solid fa-right-to-bracket"></i>

लॉगिन

</button>

</form>

</div>

</body>
</html>