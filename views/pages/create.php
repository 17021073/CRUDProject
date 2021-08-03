<?php
    $title = "Create";
    require_once 'views/layout_header.php';
?>

    <div class='contain'>
        <a class='btn_back' href="http://localhost/CRUDProject/?controller=pages&action=home">Back home</a>
        <form action="" method="POST" class="form_create">
            <table class="table_create">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name='name' class='form-info'></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="description" id="" cols="20" rows="5" class="form-info"></textarea></td>
                </tr>
                <tr>
                    <td>Photo</td>
                    <td><input class="form-info" type="text" name='image' placeholder="Please write link to image (Ex:http://.. .png)"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value='Create' class="button" name="create">
                    </td>
                </tr>
            </table>
        </form>
    </div>

<?php
    require_once 'views/layout_footer.php';
?>