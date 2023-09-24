<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form name="my-form" method="post" action="save_input.php">
        <table>
            <tr>
                <td><label for="name">Your Name </label></td>
                <td>:</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td><label for="email">Email Address </label></td>
                <td>:</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td><label for="comment">Comment </label></td>
                <td>:</td>
                <td><textarea name="comment" id="comment" cols="20" rows="5"></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" name="simpan" value="Save"></td>
            </tr>
        </table>
    </form> 
</body>
</html>