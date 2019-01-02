<h1>coisar arquivo</h1>
    <div class="form-group">
        <form action="addlivro.php" method="post" enctype="multipart/form-data">
            <label for="preco">Escolher arquivo de imagem</label>
            <input name="li_img" type="file" required class="form-control" placeholder="">
        </form>
        <button type="submit" class="btn btn-pimary" name="gravarteste">Enviar</button>
        <?php
        if($msg!=false){
         echo "<p> $msg </p>";
        }
        ?>
    </div>
