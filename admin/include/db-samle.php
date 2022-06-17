<!-- rename this to db.php to use -->
<!-- Admin Login email: admin@ptu.ac.in
Password: admin
-->
<?php 
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname= "certificate_ikgptu";
try {
$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// echo "Connected successfully";
} catch(PDOException $e) {
// echo "Connection failed: " . $e->getMessage();
}
?>