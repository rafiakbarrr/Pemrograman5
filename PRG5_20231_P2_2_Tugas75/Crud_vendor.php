<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Jenis ATK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
        .btn {
            background-color: DodgerBlue; 
            border: none; 
            color: white; 
            padding: 10px 10px; 
            font-size: 15px; 
            cursor: pointer; 
        }
        .btn:hover {
            background-color: RoyalBlue;
        }
        .textbox {
            border: none;
        }
    </style>

</head>
<body>
    <main>
    <nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">ATK</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="ATK.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Jenis ATK</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Crud_jenis.php">Vendor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Crud_jenis.php">ATK</a>
            </li>
            </ul>
            <form role="search">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            </form>
        </div>
        </div>
        </nav>

        <!-- Table -->
        <br><br>
        <div class="container-lg">
        <form action="" method="post">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-10"><h2>Vendor <b>ATK</b></h2></div>
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-info add-new" name="button_tambah"><i class="fa fa-plus"></i> Add</button>
                            </div>
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-info add-new" name="button_refresh"><i class="fa fa-refresh"></i> Refresh</button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID Vendor</th>
                                <th>Nama Vendor</th>
                                <th>Alamat Vendor</th>
                                <th>Telp Vendor</th>
                                <th>Email Vendor</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            if(isset($_POST['button_tambah'])){
                        ?> 
                                <tr>
                                    <td><input type="text" name="id_vendor" class="textbox"></td>
                                    <td><input type="text" name="nama_vendor" class="textbox"></td>
                                    <td><input type="text" name="alamat_vendor" class="textbox"></td>
                                    <td><input type="text" name="telp_vendor" class="textbox"></td>
                                    <td><input type="email" name="email_vendor" class="textbox"></td>
                                    <td>
                                    <button type="submit" class="btn" name="button_save"><i class="fa fa-check"></i></button>
                                    </td>
                                </tr>
                        <?php 
                            }
                            $filename = "data_vendor.txt";
                            $file = fopen($filename, "r");
                            if ($file) {
                                while (($line = fgets($file)) !== false) {
                                    $data = explode("|", $line);
                                    echo "<tr>";
                                    echo "<td>" . $data[0] . "</td>";
                                    echo "<td>" . $data[1] . "</td>";
                                    echo "<td>" . $data[2] . "</td>";
                                    echo "<td>" . $data[3] . "</td>";
                                    echo "<td>" . $data[4] . "</td>";
                                    ?>
                                        <td>
                                        <form action="" name="form_input" method="post">
                                            <input type="hidden" name="edit_id" value="<?php echo $data[0]; ?>">
                                            <input type="hidden" name="edit_nama" value="<?php echo $data[1]; ?>">
                                            <input type="hidden" name="edit_alamat" value="<?php echo $data[2]; ?>">
                                            <input type="hidden" name="edit_telp" value="<?php echo $data[3]; ?>">
                                            <input type="hidden" name="edit_email" value="<?php echo $data[4]; ?>">
                                            <button type="submit" class="btn" name="button_edit"><i class="fa fa-edit"></i> Edit</button>
                                            <button type="submit" class="btn" name="button_delete"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                        </td>
                                        </tr>
                        <?php 
                                }
                                fclose($file);
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
    <?php 
        //Simpan Data
        if (isset($_POST['button_save'])) {
            $id_vendor = $_POST['id_vendor'];
            $nama_vendor = $_POST['nama_vendor'];    
            $alamat_vendor = $_POST['alamat_vendor'];    
            $telp_vendor = $_POST['telp_vendor'];    
            $email_vendor = $_POST['email_vendor'];    
            if($_POST['id_vendor']!=null || $_POST['nama_vendor']!=null || $_POST['alamat_vendor']!=null || $_POST['telp_vendor']!=null || $_POST['email_vendor']!=null){
                $filename = "data_vendor.txt";
                $f_data = $id_vendor."|".$nama_vendor. "|".$alamat_vendor."|".$telp_vendor."|".$email_vendor."\n";
                $file = fopen($filename,"a");
                fwrite($file,$f_data);
                fclose($file);
            }else{
                echo "<script>alert('Data tidak boleh kosong!')</script>";
            }
        }
    ?>
    <?php 
        $handle = fopen("data_vendor.txt", "r") or die("Unable to open file!");
        if($handle){
            $searchKeyword = isset($_POST['edit_id']) ? $_POST['edit_id'] : '';
            if(isset($_POST['button_edit'])){
                while(($line = fgets($handle)) !== false){
                    $arr_data = explode("|", $line);
                    
                    if (!empty($searchKeyword) && trim($arr_data[0]) == trim($searchKeyword) ){
                    ?>
                    <br>
                        <div class="container-lg">
                        <form action="" method="post" name="form_update">
                            <table>
                                <tr>
                                    <td><label for="id_vendor">ID Vendor</label></td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" name="id_vendor" value="<?php echo $arr_data[0];?>" readonly></td>
                                </tr>
                                <tr>
                                <td> 
                                    <label for="nama_vendor">Nama Vendor</label></td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" name="nama_vendor" value="<?php echo $arr_data[1];?>"></td>
                                </tr>
                                <tr>
                                <td> 
                                    <label for="alamat_vendor">Alamat Vendor</label></td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" name="alamat_vendor" value="<?php echo $arr_data[2];?>"></td>
                                </tr>
                                <tr>
                                <td> 
                                    <label for="telp_vendor">Telp Vendor</label></td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" name="telp_vendor" value="<?php echo $arr_data[3];?>"></td>
                                </tr>
                                <tr>
                                <td> 
                                    <label for="email_vendor">Email Vendor</label></td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" name="email_vendor" value="<?php echo $arr_data[4];?>"></td>
                                </tr>
                                <br>
                                <tr>
                                    <td><button type="submit" class="btn" name="button_save_update"><i class="fa fa-check"></i> Save</button></td>
                                    <td><button type="reset" class="btn" name="button_reset"><i class="fa fa-repeat"></i> Reset</button></td>
                                </tr>
                            </table>
                        </form>
                        </div>
    <?php 
                    }
                }
            }else if(isset($_POST['button_delete'])){
                $nametoDelete = $searchKeyword;
                $filename = "data_vendor.txt";
                $lines = file($filename);
                $newLines = [];
                foreach ($lines as $line) {
                    $arr_data = explode("|", $line);
                    if (trim($arr_data[0]) === trim($nametoDelete)) {
                        continue;
                    }
                    $newLines[] = $line;
                }
                file_put_contents($filename, implode('', $newLines));
                echo "Data berhasil dihapus!";
            }
            fclose($handle);
        }

        if(isset($_POST['button_save_update'])){
            $id_vendor = $_POST['id_vendor'];
            $nama_baru = $_POST['nama_vendor'];
            $alamat_baru = $_POST['alamat_vendor'];
            $telp_baru = $_POST['telp_vendor'];
            $email_baru = $_POST['email_vendor'];
        
            // Baca data dari file
            $filename = "data_vendor.txt";
            $data_baru = array();
            
            $file = fopen($filename,"r");
            if($file){
                while(($line = fgets($file))!== false){
                    list($id, $nama,$alamat,$telp,$email) = explode("|", $line);
                    if ($id === $id_vendor) {
                        $new_line = "$id_vendor|$nama_baru|$alamat_baru|$telp_baru|$email_baru\n";
                    } else {
                        $new_line = "$id|$nama|$alamat|$telp|$email";
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
    ?>
    </main>
</body>
</html>