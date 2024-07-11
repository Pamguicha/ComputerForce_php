<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title> Registration Form| Computer Force </title>
</head>

<body>
  <img class="logo" src="images/logoCf.png" alt="an image of the logo of Computer Force">
  <nav class="nav_bar">
    <ul class="menuList">
      <li class="menuListLink">
        <a class="menuClickeableLink homeLink" href="index.html">Home</a>
      </li>
      <li class="menuListLink">
        <a class="menuClickeableLink" href="products.html">Products</a>
      </li>
      <li class="menuListLink">
        <a class="menuClickeableLink" href="register.php">Register</a>
      </li>
      <li class="menuListLink">
        <a class="menuClickeableLink" href="cart.html">Cart</a>
      </li>
      <li class="menuListLink">
        <a class="menuClickeableLink" href="About.html">About</a>
      </li>
    </ul>
    <form role="search"   class="search-container">
      <input class="search-bar" type="search" aria-label="search results box" placeholder="search brands" id="search" value="">
      <input class="search-btn" type="button"
      value="search" aria-label="submision button">
    </form>
  </nav>
  <h1 class="titlePage"> REGISTRATION FORM </h1>
  <p class="welcomeParagraph"> Please complete the following form to register for an account on our website</p>
  <a class="cfPrivacyPolicyLink" href="images/ComputerForce PrivacyPolicy.pdf" title="Download Computer Force Privacy Policy" target="_blank"> 
  Computer Force&#180;s Privacy Policy

  </a>
  <div class="container-grid">
    <main class="mainSectionRegisterForm">
      <form action="php/processForm.php" method="post">
        <label for="uname">Username:</label>
        <input type="text" id="uname" name="username" value="<?php if (isset($_POST['username'])) { echo $_POST['username'];} ?>">
        <!-- display errors -->
         <label name="message"><?php echo $message; ?>
        </label> 
       <br>
      <input type="submit" name="submitMessage" value="submit"> <br>
      </form>
    </main>
    <aside>
    <h2 class="title-aside">
      Purchases
    </h2>
    <p class="row-1-col1"><strong>0</strong> items</p>
    <p class="row-1-col2">Cart sub-total: <strong>$0</strong></p>
    <button class="row-2-col1_col2">Go to Checkout</button>
    </aside>
  </div>
 
  <footer>
    <p class="textFooter"> &copy; 2024 Pamela Mardones </p>
  </footer>
</body>