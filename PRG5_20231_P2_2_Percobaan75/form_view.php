<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
</head>
<body>
    <h1>Data Nama</h1>
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