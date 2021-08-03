<?php
    $title = "Update";
    require_once 'views/layout_header.php';
?>

    <div class='contain'>
        <a class='btn_back' href="http://localhost/CRUDProject/?controller=pages&action=home">Back home</a>
        <form action="" method="POST" class="form_create">
            <table class="table_create">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name='name' value="<?php if(isset($_POST['name'])){echo $data['name'];}else{echo $row->name;}  ?>" class='form-info'></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="description" id="" cols="20" rows="5" class="form-info"><?php if(isset($_POST['description'])){echo $data['description'];}else{echo $row->description;} ?></textarea></td>
                </tr>
                <tr>
                    <td>Photo</td>
                    <td><input class="form-info" value="<?php if(isset($_POST['image'])){echo $data['img'];}else{echo $row->img;}  ?>" type="text" name='image' placeholder="Please write link to image (Ex:http://.. .png)"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value='Update' class="button" name="update">
                    </td>
                </tr>
            </table>
        </form>
    </div>

<?php
    require_once 'views/layout_footer.php';
?>