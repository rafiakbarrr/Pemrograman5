<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit_Hapus_data</title>
</head>
<body>
<h1>Data Nama</h1>
    <!-- Menampilkan Tabel -->
    <?php 
        $handle = fopen("mydata.txt", "r") or die("Unable to open file!");
        if($handle){
    ?>
        <table border="1">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Comment</th>
            </tr>
    <?php 
        $no = 1;
        while(($line = fgets($handle)) !== false){
            $arr_data = explode("|",$line);
    ?>
            
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $arr_data[0];?></td>
                <td><?php echo $arr_data[1];?></td>
                <td><?php echo $arr_data[2];?></td>
            </tr>
            <?php $no++;?>
    <?php }?>
        </table>
    <?php 
        }
        fclose($handle);    
    ?>
    <br>
    <form name="form_edit" action="" method="post">
        <label for="email_cari">Masukkan Email untuk mencari data :</label>
        <input type="text" name="email_cari">
        <input type="submit" name="cari" value="Cari">
        <input type="submit" name="refresh" value="Refresh">
    </form>
    
    
<!-- Menampilkan Data sesuai email yang dicari -->
<?php
if (isset($_POST['cari'])) {
    $file = fopen("mydata.txt", "r");
    if ($file) {
        $found = false;
        while (($line = fgets($file)) !== false) {
            list($nama, $email, $comment) = explode("|", $line);
            if ($email === $_POST['email_cari']) {
?>
                <br><br>
                <form name="form_tampil" method="post" action="">
                <table>
                    <tr>
                        <td><label for="nama_baru">Nama</label></td>
                        <td>:</td>
                        <td><input type="text" name="nama_baru" value="<?php echo $nama ?>"></td>
                    </tr>
                        <td><label for="comment_baru">Comment</label></td>
                        <td>:</td>
                        <td><textarea name="comment_baru" val><?php echo $comment ?></textarea></td>  
                </table>
                    <input type="hidden" name="email_cari" value="<?php echo $_POST['email_cari']; ?>">
                    <input type="submit" name="edit_data" value="Edit">
                    <input type="submit" name="hapus_data" value="Hapus">

                </form>    
                <?php $found = true;?>
<?php 
            } 
        }
    }
    fclose($file);
    if(!$found){
        echo "Email Tidak ditemukan";
    }
}
// Mengedit Data yang dipilih
?>
<?php 
    if(isset($_POST['edit_data'])){
        $nama_baru = $_POST['nama_baru'];
        $email_cari = $_POST['email_cari'];
        $comment_baru = $_POST['comment_baru'];

        $filename = "mydata.txt";
        $data_baru = array();

        $file = fopen($filename,"r");
        if($file){
            while(($line = fgets($file))!== false){
                list($nama, $email, $comment) = explode("|", $line);
                if ($email === $email_cari) {
                    $new_line = "$nama_baru|$email_cari|$comment_baru";
                } else {
                    $new_line = "$nama|$email|$comment";
                }
                array_push($data_baru, $new_line);
            }
        }
        fclose($file);

        $file = fopen($filename,"w");
        foreach($data_baru as $line){
            fwrite($file,$line);
        }
        fclose($file);
        echo "Data Berhasil Diedit!";
    }

    if(isset($_POST['refresh'])){
        header("Refresh:0");
    }
?>

<!-- Hapus Data -->
<?php 
    if(isset($_POST['hapus_data'])){
        $email_hapus = $_POST['email_cari'];
        
        $filename = "mydata.txt";
        $data_baru = array();

        $file = fopen($filename,"r");

        if ($file) {
            while (($line = fgets($file)) !== false) {
                $line = trim($line);
                list($nama, $email, $comment) = explode("|", $line);
                if ($email !== $email_hapus) {
                    $new_line = "$nama|$email|$comment\n";
                    array_push($data_baru, $new_line);
                }
            }
            fclose($file);

            $file = fopen($filename, "w");
            foreach ($data_baru as $line) {
                fwrite($file, $line);
            }
            fclose($file);

            echo "Data Berhasil Dihapus!";
        }
    }
?>
</body>
</html>