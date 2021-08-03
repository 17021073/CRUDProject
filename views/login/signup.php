<?php
    // header
    $title = "SignUp";
    require_once 'views/layout_header.php';
  
?>

    <!-- Signup form -->
    <div class='contained'>

        <h2>Signup</h2>
        <form action="<?php echo 'http://localhost/CRUDProject/?controller=login&action=signup'?>" method="POST">
            <span class="invalid-info"><?php echo $data['nameError']; ?></span>
            <input type="text" class="form-info" name="username" value="" placeholder="Username" >

            <span class="invalid-info"><?php echo $data['emailError']; ?></span>
            <input type="email" class="form-info" name="email" placeholder="Email">

            <span class="invalid-info"><?php echo $data['passwordError']; ?></span>
            <input type="password" class="form-info" name="password" value="" placeholder="Password">

            <span class="invalid-info"><?php echo $data['confirmPasswordError']; ?></span>
            <input type="password" class="form-info" name="confirmPassword" value="" placeholder="Confirm Password">
            
            <input type="submit" value="Submit" class="button primary" name="signup">
        </form>
        <a class='create-acc-link' href="http://localhost/CRUDProject/?controller=login&action=login">Login</a>
    </div>

<?php
    // footer
    require_once 'views/layout_footer.php';
?>