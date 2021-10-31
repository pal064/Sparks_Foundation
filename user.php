<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Customers</title>
       <meta charset="UTF-8" />
       <meta name="viewport" content="width=device-width, initial-scale=1.0" />
       
 <link href="https://fonts.googleapis.com/css2?family=Anton&family=Gabriela&display=swap" rel="stylesheet">
    <!-- CSS-->
<style>
.main-nav
{
    float:right;
    list-style:none;
    margin-top:10px;
}
.main-nav li
{
    display:inline-block;
    margin-left:20px;
   
    
}
.main-nav li a
{
    color:black;
    text-decoration:none;
    font-size:150%;
    font-weight:bold;
}
.main-nav li a:hover
{
    color:#e67e22;
    border-bottom:2px solid #e67e22;
    transition:all 0.3s ease-in;
    padding:20px;
}

  
            
            table {
                border-collapse: collapse;
                width: 100%;
                color:black;
                font-size: 25px;
                text-align: left;
            }

            th {
                
                 background-color: #d2691e;
                color: white;
            }

            tr:nth-child(even) {
                
                background-color:#7fffd4;
            }
</style>
</head>
        <body>

            <header>
         <!--Navbar Starts Here -->
         <div class="row">
          <ul class="main-nav">
           <li><a href="index.html">Home</a></li>
           <li> <a href="user.php">Customers List</a></li>
            <li><a href="history.php">Transactions</a></li>
          </ul>
      </div>
  </header>
    
<!-- navbar ends here  -->
    
   
       <br><br><br> <div style="font-family: 'Gabriela',serif; font-size: 40px; text-align: center;margin: 20px;">Our Customer</div>
        <table>
        <tr>
            <th>Sr.No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Balance</th>
            <th>Details</th>
        </tr>


        <?php
        // Connecting to the Database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "bank";

        // Create a connection
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Die if connection was not successful
        if (!$conn){
            die("Sorry we failed to connect: ". mysqli_connect_error());
        }


        $sql = "SELECT * FROM `user`";
        $result = mysqli_query($conn, $sql);

        // Find the number of records returned
        $num = mysqli_num_rows($result);

        // Display the rows returned by the sql query
        if($num> 0){
            

            // We can fetch in a better way using the while loop
            while($row = mysqli_fetch_assoc($result)){
                // echo var_dump($row);
            
                
                echo "<tr>";
            echo '<form method ="post" action = "Details.php">';
            echo "<td>" . $row["S.No."]. "</td><td>" . $row["name"] . "</td>
            <td>" . $row["email_id"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["balance"] . "</td>";
            echo "<td ><a href='Details.php?user={$row["name"]}&message=no' type='button' name='user'  id='users1' ><span>View Account</span></a></td>";
            echo "</tr>";
        }
        echo "</table>";
        }
        ?>

        </section>
     </table>
    
    </body>
</html>