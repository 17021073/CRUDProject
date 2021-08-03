<?php
    
    $title = 'Login';
    require_once 'views/layout_header.php';
?>

    <!-- Login form -->
    <div class='contained'>
        <h2>Login</h2>
        <p class='error'>Please enter correct username and password</p>
        <form action="<?php echo 'http://localhost/CRUDProject/?controller=login&action=login'?>" method='POST'>
            <span class="invalid-info"><?php echo $data['usernameError'] ?></span>
            <input id="username" type="text" class="form-info" name="username" 
                value="<?php if(isset($_COOKIE['username'])){ echo $_COOKIE['username'];}else {echo "";} ?>" placeholder="Username" >
            
            <span class="invalid-info"><?php echo $data['passwordError']; ?></span>
            <input id="password" type="password" class="form-info" name="password" 
                value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];}else {echo "";} ?>" placeholder="Password">
            <p class="remember_me">
                <input type="checkbox" name='remember' id="remember">
                <label for="remember">Remember me</label>
            </p>
            
            <input type="submit" value="Login" class="button primary" name="login">
        </form>
        <a class='create-acc-link' href="http://localhost/CRUDProject/?controller=login&action=signup">Create account</a>
    </div>

<?php
    require_once 'views/layout_footer.php';
?>
