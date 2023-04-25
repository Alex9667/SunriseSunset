<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 
        Form containing the user inputs. Method is used as it allows us to get 
        the user input from the php code.  
    -->
    <form method="post">
        <input type="submit" name="submitButton" value="Hent info for den indtastede by">
        <select name="city" value="Byer">
            <option value="Kolding">Kolding</option>
            <option value="København">København</option>
            <option value="Aalborg">Aalborg</option>
            <option value="Aarhus">Aarhus</option>
            <option value="Odense">Odense</option>
            <option value="Middelfart">Middelfart</option>
            <option value="Esbjerg">Esbjerg</option>
        </select>
        API nøgle:<input type="text" name="key" value="bf948622be1db3b84e3748981fd38e27"> (standardnøgle bf948622be1db3b84e3748981fd38e27)
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>By</th>
                <th>Dag</th>
                <th>Solopgang</th>
                <th>Solnedgang</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $data = "not specified";
            //Includeing the 'ApiResponse.php' file so we can use the method inside.
                include "ApiResponse.php";
                if(isset($_POST['submitButton'])){
                    $data = GetData($_POST["city"], $_POST["key"]);
                }
                if($data != "not specified"){
                    for ($i=0; $i < count($data); $i++){?>
                <tr>
                    <td><?php echo $data['city']['name'] ?></td>
                    <td><?php echo date("d-m-Y", $data['city']['sunrise']) ?></td>
                    <td><?php echo date("h:i", $data['city']['sunrise']) ?></td>
                    <td><?php echo date("h:i", $data['city']['sunset']) ?></td>
                </tr>
            <?php }}?>
        </tbody>
    </table>
</body>
</html>
<?php 
?>