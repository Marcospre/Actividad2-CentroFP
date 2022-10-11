<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }
        
        .wrap{
            display:flex ;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="wrap">
    	<h2>Login</h2>
        <form action="login_tutor.php" method="get">
            <table>
            <tr>
               <td><label for="user">User:</label></td>
                <td><input type="text" id="user" name="user"><br><br></td>
            </tr>
            <tr>
               <td><label for="pass">Pass:</label></td>
               <td><input type="text" id="pass" name="pass"><br><br></td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit"></td>
             </tr>
           </table>
       </form>
            
        
     </div>
</body>

</html>