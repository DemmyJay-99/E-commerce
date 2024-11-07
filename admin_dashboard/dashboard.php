<?php
session_start();
include 'config.php';
// include "top_component.php";
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-image: url(background/e4ea038a91f398f6b27e13c30b327372.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;            
        }
h1{
         margin: auto;
         background: linear-gradient(to right,red,blue,red);
         background-clip: text;
         color: transparent;
        margin-bottom: 50px; 
        width: 90%;
        font-weight: 900;
        /* background-color: #f0f0f0; */
        padding: 20px;
        border-radius: 10px;
        font-size: 50px;
        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        transition: top 0.5s ease-in-out, left 0.5s ease-in-out, transform 0.5s ease-in-out;
    }
    h1.slide-up{
        top: 10px;
        left: 10px;
        transform: none;
    }
    .welcome-container {
    position: relative;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }
    .content{
        margin-top: 50px;
        width: 90%;
        display: grid;
        gap: 0.8em;
        grid-template-columns: repeat(auto-fit, minmax(min(240px, 100%),2fr));
        padding: 20px;
        align-self: center;
    }
    .content a{
        margin: 40px;
        margin-bottom: 2em;
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 9px 0 14px 0;
        text-align: center;
        padding: 50px;
        display: inline-block;
        text-decoration: none;
        font-weight: 500;
        background: linear-gradient(to right,red,blue,red);
        background-clip: text;
    }
    .content a:hover{
        opacity: 4;
    }
    .hand-second{
        transform: rotate(50deg);
        margin-left: 0px;
    }
    .hand-first{
        transform: rotate(-30deg);
    }
    </style>
</head>
<body>
    <div class="welcome-container">
    <section class= "my_profile_section">
    <h1 class="welcome-message">Welcome, 
            <?php echo $_SESSION['admin_username'] ?>
        </h1><center>
        <div class="content" style="opacity: 0.2;display:block;">
    <a href="product_form.php">
        <?php include "icons/add_product.svg" ?> <br>
        Add products</a></button>
        
    <a href="all_user.php">
    <?php include_once "./icons/users.svg"; ?> <br>
        All Users</a>

    <a href="all_products.php">
    <?php include_once "./icons/all_products.svg"; ?> <br>
        All Products</a>
        
    <a href="change_password.php">
    <?php include_once "./icons/change_password.svg"; ?> <br>
        Change Password</a>

    <a href="edit_profile.php">
    <?php include_once "./icons/edit.svg"; ?> <br>
        Edit Profile</a>

    <a href="logout.php">
        <?php include_once "./icons/logout_icon.svg"; ?> <br>
        Logout</a>
    </div>
</center>
</section>
    </div>
<script defer src="javascript/slide.js"></script>
</body>
</html>