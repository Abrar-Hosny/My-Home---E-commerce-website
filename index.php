

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.1/tailwind.min.css"
  />
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css"
    rel="stylesheet"
  />    
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>



</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">

<?php if(isset ($_SESSION["user_id"])):?>
    <p>in</p>
    <a href="signout.php">log out</a>

<?php else:?>
<a href="loginform.php"> </a>
  <?php endif;?>
    
</body>