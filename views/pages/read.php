<?php
    $title = "Read card";
    require_once 'views/layout_header.php';
?>
    
    <div class="back">
    <a class='btn_back back-read' href="http://localhost/CRUDProject/?controller=pages&action=home">Back home</a>
    </div>
    <div class='main'>
    
        <div class="card-img">
            <img src="<?php echo $row->img; ?>" alt="">
        </div>
        <div class="des-group">
            <h3 class="title"><?php echo $row->name; ?></h3>
            <p class="des"><?php echo $row->description; ?></p>
        </div>
    </div>

<?php
    require_once 'views/layout_footer.php';
?>