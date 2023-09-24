<?php 
if (($_POST['name']!=null)) {
    $get_name = $_POST["name"];
    $get_email = $_POST['email'];
    $get_comment = $_POST['comment'];

    echo "Name: ".$get_name."<br>";
    echo "Email: ".$get_email."<br>";
    echo "Comment: ".$get_comment."<br>";
    //Simpan Data
    $filename = "mydata.txt";
    $f_data = $get_name."|".$get_email."|".$get_comment."\n";
    $file = fopen($filename,"a");
    fwrite($file,$f_data);
    fclose($file);
    echo 'Data berhasil disimpan '.$filename.' <br>
    
    <a href="'.$filename.'">Klik untuk melihat data </a> <br>
    ---------- <br> <a href ="form_input.php">Klik untuk input data kembali</a><br>----------<br><a href="form_edit_hapus.php">Klik untuk mengedit dan menghapus data</a><br>----------<br>
    ';
}else{
?>
    <script>alert('Maaf, tidak ada inputan!')</script>
    <form action="form_input.php" method="post">
        <button type="submit">GO BACK</button>
    </form>
<?php 
    }
    
?>
