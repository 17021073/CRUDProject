<?php
    session_start();

    // header
    $title = "Home";  
    require_once 'views/layout_header.php';
    
    
?>
    <!-- acc info -->
    <div class='navigation'>
        <span class="head-title">Welcome <?php echo $_SESSION['username']; ?> go to my website!</span> 

        <?php
            
            if($_SESSION['username']){
                echo "<a href='http://localhost/CRUDProject/?controller=login&action=logout'>Logout</a>";
            }else {
                echo "<a href='http://localhost/CRUDProject/?controller=login&action=login'>Login</a>";
            }
        ?>
       
    </div>

    <!-- create cart button -->

        <a class="btn-create" 
            href="<?php if($_SESSION['username']){echo 'http://localhost/CRUDProject/?controller=pages&action=create';}else{echo 'http://localhost/CRUDProject/?controller=login&action=login';} ?>">Create cart</a>

    <!-- list item -->
    <div class="cart-list">

        <?php
       
            foreach($cards as $item){
                $id = $item['id'];

                if($_SESSION['username']){
                    $edit = "http://localhost/CRUDProject/?controller=pages&action=update&id={$id}";
                    $delete = "<a onclick='delete_card({$id});' id='delete-btn' class='btn delete'>Delete</a>";
                }else {
                    $edit = 'http://localhost/CRUDProject/?controller=login&action=login';
                    $delete = "<a href='http://localhost/CRUDProject/?controller=login&action=login' class='btn delete'>Delete</a>";
                }
          
                echo "<div class='cart'>";
                    echo "<a href='http://localhost/CRUDProject/?controller=pages&action=read&id={$id}' style='text-decoration: none'>";
                        echo "<img class='cart-img' src='{$item['img']}' alt=''>";
                        echo "<h3 class='cart-title'>{$item['name']}</h3>";
                    echo "</a>";
                    echo "<div class='btn-group'>";
                        echo "<a href='{$edit}' class='btn update'>Edit</a>";
                        echo "{$delete}";
                        
                    echo "</div>";

                echo "</div>";
       
            }
        ?>
        <!-- http://localhost/CRUDProject/?controller=pages&action=delete&id={$id} -->

    </div>


<?php
    require_once 'views/layout_footer.php'
?>