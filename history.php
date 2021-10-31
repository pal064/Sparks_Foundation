<!DOCTYPE html>
<html>
<head>
<title>Transaction history</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Gabriela&display=swap" rel="stylesheet">
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
        tr:nth-child(odd) {
            background-color: #7fffd4;
        }

        
        nav ul li{
            list-style: none;
            margin: 50px 20px;
        }
        nav ul li a{
            text-decoration: none;
            color: #fff;
        }
        
    </style>
</head>
    <!--Pallabi Chakraborty-->

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



 <br><br><br>   <div style="font-family: 'Gabriela', serif;   font-size: 40px;
        text-align: center;
        margin: 20px;
    ">Transaction History</div>
    <table>
    <tr>
    <th>Sender's Name</th>
    <th>Sender's Account</th>
    <th>Reciever's Name</th>
    <th>Reciever's Account </th>
    <th>Amount</th>
    <th>Date and Time</th>
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


        $sql = "SELECT * FROM `transfer`";
        $result = mysqli_query($conn, $sql);

        // Find the number of records returned
        $num = mysqli_num_rows($result);

        // Display the rows returned by the sql query
        if($num> 0){
            

            // We can fetch in a better way using the while loop
            while($row = mysqli_fetch_assoc($result)){
                // echo var_dump($row);
                echo "<tr>";
                echo "<td>" . $row["s_name"]. "</td><td>" . $row["s_acc_no"] . "</td>
                <td>" . $row["r_name"] . "</td><td>" . $row["r_acc_no"] . "</td><td>" . $row["amount"] . "</td><td>" . $row["date_time"] . "</td>";
                echo "</tr>";
        }
        echo "</table>";
        }
    ?>
 </table>
    </body>
</html>