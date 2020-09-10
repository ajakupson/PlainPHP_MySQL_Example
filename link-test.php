<html>
<head>
    <title>PHP Test</title>
</head>
    <body>
    <?php echo '<p>Hello World</p>';

    // In the variables section below, replace user and password with your own MySQL credentials as created on your server
    $servername = "localhost";
    $username = "root";
    $password = "TiAsGa90";
    $db = "test";

    // Create MySQL connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection - if it fails, output will include the error message
    if (!$conn) {
        die('<p>Connection failed: </p>' . mysqli_connect_error());
    }
    echo '<p>Connected successfully</p>';

    $query = "SELECT * FROM data";
    $qresult = mysqli_query($conn, $query);
    $numRows=mysqli_num_rows($qresult);
    $data = array();
    for($r=0; $r<$numRows; $r++) {
     //$data[]=mysqli_fetch_row($qresult);
     $data[]=mysqli_fetch_assoc($qresult);
    }
    print_r($data);
    echo "First row name: ".$data[0]["name"];
    echo '<hr/>';

    $number = 4.89;
    echo floor($number);
    echo "<br/>".getenv('HTTP_USER_AGENT');

    ?>
</body>
</html>
