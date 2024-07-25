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
<?php
//defining username variable and set to empty values
$userNameError = $emailError = $passwordError = $confirmPasswordError = $firstNameError = $surnameError = $genderError = $addressError = $suburbError = $postcodeError = $stateError = $phoneError = "";

$username = $email = $password = $confirmPassword = $firstName = $surname = $address = $suburb = $postcode = $state = $phone = "";

  //filter
   $hasPostOccured = filter_input(INPUT_SERVER, "REQUEST_METHOD");
  //check if form is submitted
   if($hasPostOccured == "POST") {
      if(empty($_POST["username"])) {
        $userNameError ="Required. Must be between 6 characters and 20 characters. Must not contain any special characters.";
      } else {
          $username = test_input($_POST["username"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
        $userNameError= "Must not contain any special characters.Only letters and white space allowed";
      } elseif (strlen($username) < 6 || strlen($username) >20){
        $userNameError ="Must be between 6 characters and 20 characters";
       } 
      }
      //validate email
     if(empty($_POST["email"])) {
      $emailError = "Email is required";
     } else {
      $email = test_input($_POST["email"]);
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format";
      }
     }
     //validate password Required. Must be between 8 characters and 12 characters.
     if(empty($_POST["password"])) {
      $passwordError = "Password is required";
     } else {
      $password = test_input($_POST["password"]);
      $patternPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,12}$/'; 
      if(!preg_match ($patternPassword, $password)){
        $passwordError = "Must be a valid password. Must be between 8 characters and 12 characters. It must contains at least one number and capital letter"; 
      } else {
        $password = "";
      }
     }
     //validate confirmation password
     if(empty($_POST["confirmPassword"])) {
       $confirmPasswordError = "Confirmation password is required";
     } elseif  ($_POST['confirmPassword']!= $_POST['password']){
      $confirmPasswordError = "Required. Must match the password that the user has entered.";
     } else {
      $confirmPassword = test_input($_POST["password"]);
      $patternPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,12}$/'; 
      if(!preg_match ($patternPassword, $confirmPassword)) {
        $confirmPasswordError = "Must be a valid password. Must be between 8 characters and 12 characters.";
     } else {
      $confirmPassword = "";
     }
    }
  //validate firstName
    if(empty($_POST["firstname"])) {
        $firstNameError ="Required. Must be between 3 characters and 20 characters. Must not contain any special characters or empty";
    } else { 
      $firstName = test_input($_POST["firstname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$firstName)) {
        $firstNameError= "Must not contain any special characters.Only letters and white space allowed";
    } elseif (strlen($firstName) < 3 || strlen($firstName) >20) {
      $firstNameError ="Must be between 3 characters and 20 characters";
    }
  }
  //validate surname
    if(empty($_POST["surname"])) {
      $surnameError = "Required. Must be between 3 characters and 20 characters. Must not contain any special characters.";
    } else {
      $surname = test_input($_POST["surname"]);
        if(!preg_match("/^[a-zA-Z-' ]*$/",$surname)) {
          $surnameError = "Must not contain any special characters.Only letters and white space allowed";
      } elseif (strlen($surname) < 3 || strlen($surname) >20) {
        $surnameError = "Must be between 3 characters and 20 characters";
      }
    }
    //validate gender
    if(empty($_POST["gender"])) {
      $genderError = "Gender is required";
    } else {
      $gender = test_input($_POST["gender"]);
      $gender = ""; 
    }
 //validate address 
   if(empty($_POST["address"])){
    $addressError = "Address is required";
   } else {
    $address = test_input($_POST["address"]);
     if(!preg_match("/^[a-zA-Z0-9\s,.'-]{3,50}$/",$address)){
      $addressError="Must be between 3 characters and 50 characters. Must not contain any special characters.";
     } elseif (strlen($address) < 3 || strlen($address) > 50) {
          $addressError = "Must be between 3 characters and 50 characters. Must not be empty";
     }
   }
      //validate suburb
    
    if(empty($_POST["suburb"])) {
      $suburbError = "Suburb is required";
    } else {
      $suburb = test_input($_POST["suburb"]);
    if(!preg_match("/^[a-zA-Z\s\-.'0-9]+$/",$suburb)){
      $suburbError= "Required. Must be between 3 characters and 50 characters. Must not contain any special characters.";
    } elseif (strlen($suburb) < 3 || strlen($suburb) > 50){
      $suburbError=  "Required. Must be between 3 characters and 50 characters. Must not contain any special characters.";
     }
   }
  //validate postcode (Required. Must be 4 characters exactly.)
  if(empty($_POST["postcode"])) {
    $postcodeError = "Postcode is required";
  } else {
    $postcode = test_input($_POST["postcode"]);
    if(!preg_match("/^[0-9]*$/",$postcode)) {
     $postcodeError= "Required. Must be 4 characters exactly.";
    } elseif (strlen($postcode) !== 4) {
       $postcodeError= "Required. Must be 4 characters exactly.";
    }
   }
 //State (Required)
     if(empty($_POST["state"]) || $_POST["state"] == "none")  {
      $stateError = "State is required";
    } else {
      $state = test_input($_POST["state"]);
      $state = "";
     }
      
   //Phone (Must be between 8 characters and 10 characters. Must not contain any special characters)
    if(empty($_POST["phonenumber"])) {
      $phoneError = "Phone number is required";
    } else {
      $phone = test_input($_POST["phonenumber"]);
    if (!preg_match("/^[0-9]*$/",$phone)) {
      $phoneError = "Must be between 8 characters and 10 characters. Must not contain any special characters";
    } elseif (strlen($phone) < 8 || strlen($phone) >10) {
      $phoneError ="Must be between 8 characters and 10 characters.";
    }
  }
 }
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>
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
  <h1 class="titlePage"> Registration Form </h1>
  <p class="welcomeParagraph"> Please complete the following form to register for an account on our website</p>
  <div class="privacy-container">
  <a class="cfPrivacyPolicyLink" href="images/ComputerForce PrivacyPolicy.pdf" title="Download Computer Force Privacy Policy" target="_blank"> 
  Computer Force&#180;s Privacy Policy
  </a>
</div>
  <div class="container-grid">
    <main class="mainSectionRegisterForm">
      <form class="register-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label class="usernameStyle"for="uname">Username:
           <br>
         <input class="usernameInput" type="text" name="username" value="<?php echo $username; ?>">
        <!-- display errors -->
          <span class="error"> * <?php echo $userNameError; ?></span>
        </label> 
       <br>
        <label class="emailStyle" for="emailUser">Email:
          <br>
        <input class="emailInput"type="email" name="email" value="<?php echo $email; ?>">
        <!-- display errors -->
         <span class="error"> * <?php echo $emailError; ?> </span>
        </label>
        <br>  
        <label class="passwordStyle"for="passwordUser"> Password:
          <br>
          <input class="passwordInput"type="password" name="password" value="<?php echo $password; ?>" > 
           <!-- display errors -->
          <span class="error"> * <?php echo $passwordError; ?> </span>
        </label>
        <br>
        <label class="confirmPasswordStyle" for="confirmationPassword"> Confirm Password:
          <br>
          <input class="confpasswordInput"type="password" name="confirmPassword" value="<?php echo $confirmPassword; ?>">
          <!-- display errors -->
          <span class="error"> * <?php echo $confirmPasswordError; ?> </span>
        </label>
         <br>
        <label class="fnStyle"for="firstName"> First Name:
          <br>
          <input class="firstNameInput"type="text" name="firstname" value="<?php echo $firstName; ?>">
        <!-- display errors -->
         <span class="error"> * <?php echo $firstNameError; ?> </span>
         </label>
        <br>
         <label for="surName" class="snstyle"> Surname:
          <br>
          <input class="surnameInput"type="text" name="surname" value="<?php echo $surname; ?>">
        <!-- display errors -->
         <span class="error"> * <?php echo $surnameError; ?> </span>
         </label>
        <br>
         <label class="genderStyle" for="genDer"> Gender:
          <input type="radio" name="gender" value="female"> Female 
          <input type="radio" name="gender" value="male"> Male 
          <input type="radio" name="gender" value="other"> Other 
           
          <!-- display errors -->
           <span class="error"> * <?php echo $genderError; ?> </span>
         </label>
         <br>
        <label class="addressStyle"for="adDress"> Address:
           <br>
          <input class="addressInput" type="text" name="address" value="<?php echo $address; ?>">
           <!-- display errors -->
         <span class="error"> * <?php echo $addressError; ?> </span>
        </label>
        <br>
        <label class="suburbStyle"for="subUrb"> Suburb:
          <br>
          <input class="subInput" type="text" name="suburb" value="<?php echo $suburb; ?>">
           <!-- display errors -->
         <span class="error"> * <?php echo $suburbError; ?> </span>
        </label>
          <br>
           <label class="postcodeStyle"for="postCode"> Postcode:
             <br>
          <input class="postInput" type="text" name="postcode" value="<?php echo $postcode; ?>">
           <!-- display errors -->
         <span class="error"> * <?php echo $postcodeError; ?> </span>
        </label>
        <br>
          <label class="stateStyle" for="state"> State:
            <select name="state">
              <option value="none">-</option>
              <option value="ACT">ACT</option>
              <option value="NSW">NSW</option>
              <option value="NT">NT</option>
              <option value="QLD">QLD</option>
              <option value="TAS">TAS</option>
              <option value="VIC">VIC</option>
              <option value="WA">WA</option>
            </select>
           <!-- display errors -->
         <span class="error"> * <?php echo $stateError; ?> </span>
        </label>
        <br>
         <label class="phoneStyle" for="phoneNumber"> Phone number:
          <br>
          <input class="phoneinput" type="text" name="phonenumber" value="<?php echo $phone; ?>">
           <!-- display errors -->
         <span class="error"> * <?php echo $phoneError; ?> </span>
        </label>
        <br>
      <input class="clearBtn" type="reset" value="Reset">
      <input class="submitBtn" type="submit" name="submitMessage" value="submit"> <br>
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