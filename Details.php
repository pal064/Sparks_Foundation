<!DOCTYPE html>
<html>
    <head>
        <title>Details</title>
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
            color: black;
            font-size: 25px;
            text-align: left;
            }

            th {
            background: #d2691e;
            color: white;
            }

            tr:nth-child(even) {
            background-color:  #7fffd4 ;
            }

            .card {
            /* Add shadows to create the "card" effect */
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            text-align: -webkit-center;
            }

            /* On mouse-over, add a deeper shadow */
            .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            }

            /* Add some padding inside the card container */
            .container {
            padding: 20px 16px;
            margin: 40px;
           /* background: #ffbf80;*/
            background: cyan;
            
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


    <table>

        <tr>
        <th>Account Number</th>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Balance</th>
        </tr>

        <?php
        session_start();
        $server = "localhost";
        $username = "root";
        $password = "";
        $conn = mysqli_connect($server, $username, $password, "bank");
        if (!$conn) {
        die("Connection failed");
        }

        $_SESSION['user'] = $_GET['user'];
        $_SESSION['sender'] = $_SESSION['user'];


        ?>
        <?php
        if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];

        $sql = "SELECT * FROM user WHERE Name='$user'";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";

            echo "<td>" . $row["Acc_no"] . "</td><td>" . $row["name"] . "</td>
                <td>" . $row["email_id"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["balance"] . "</td>";

            echo "</tr>";
        }
        }
        ?>
        <div style="font-family: 'Gabriela', serif;   font-size: 40px; text-align: center;margin: 0px;">
           <br> <h3> Make a Transaction</h3>
        </div>
    <!--Pallabi Chakraborty-->

        <div class="card container">
            <?php
            if ($_GET['message'] == 'success') {
                echo "<h3><p style='color:green;' class='messagehide'>Transaction was completed successfully</p></h3>";
            }
            if ($_GET['message'] == 'transactionDenied') {
                echo "<h3><p style='color:red;' class='messagehide'>Transaction Failed </p></h3>";
            }
            ?>
            <form action="transfer.php" method="POST">
                <!-- Make Transcation -->

                <b>To</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp
                <select name="reciever" id="dropdown" class="textbox" required>
                <option>Select Recipient</option>
                <?php
                $db = mysqli_connect("localhost", "root", "", "bank");
                $res = mysqli_query($db, "SELECT * FROM user WHERE name!='$user'");
                while ($row = mysqli_fetch_array($res)) {
                    echo ("<option> " . "  " . $row['name'] . "</option>");
                }
                ?>
                </select>
                <br><br>
                <b> From</b>&nbsp&nbsp&nbsp&nbsp :&nbsp&nbsp <span style="font-size:1.2em;"><input id="myinput" name="sender" class="textbox" disabled type="text" value='<?php echo "$user"; ?>'></input></span>
                <br><br>


                <b>Amount :&#8377;</b>
                <input name="amount" type="number" min="100" class="textbox" required>
                <br><br>
                <a href="transfer.php"><button id="transfer" name="transfer" ;>Send Money</button></a>
            </form>
        </div>

        <div style="font-family: 'Gabriela', serif;   font-size: 40px; text-align: center; margin-bottom:0px;">
            <h3>Customer Details</h3>
        </div>
</body>
</html>