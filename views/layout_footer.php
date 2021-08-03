
</div>
<script type="text/javascript">
    function delete_card (id){
        var answer = confirm('Are you sure want to delete this card?');
        if(answer){
            // // window.location.replace("http://www.google.com");
            // console.log('yes');
            window.location.href = 'http://localhost/CRUDProject/?controller=pages&action=delete&id='+id;
            
        }
    }
</script>

</body>
</html>