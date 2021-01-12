<?php
        if (isset($_SESSION['user_id'])) {
            if ($_SESSION['role'] == 'ban')
{
    echo '<meta http-equiv="refresh" content="0; url=ban.php " />';
    die();
}
            elseif ($_SESSION['role'] == 'member'){
           ?>
            
            <nav>
           <a href="home.php">Home | </a>
           <a href ="accountPanel.php">Account Panel | </a>
           <a href="logout.php">Logout</a><br />
            </nav>
            </header>
        
            <?php 
            $link = mysqli_connect($HOST, $USERNAME, $PASSWORD, $DB);
 
        //match the username and password entered with database record
        $query = ("SELECT id,role,username FROM `users` WHERE id='".$_SESSION['user_id']."'");
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
            $row = mysqli_fetch_array($result);
            $_SESSION['user_id']= $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            
 
            echo '<p><i>Welcome, '. $_SESSION['username'];?>
        
        <br>
               <?php echo 'You are logged in as ' . '(' . $_SESSION['role'] . ')' ?>
            <br>
            
            
            <?php
                   } else{ ?>
         
            <nav> <a href="home.php">Home | </a>
           <a href ="adminPanel.php">Admin Panel | </a>
           <a href="logout.php">Logout</a><br />
            </nav>
            </header>
 
 
        <?php }} else {
            ?>
            <nav>
           <a href="home.php">Home</a>
           <a href ="register.php">Register</a>
           <a href="login.php">Login</a><br />
           </nav>
            </header>
             
            <?php
        }
        ?>
 