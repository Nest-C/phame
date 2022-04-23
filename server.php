<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "phamee";

    // Create Connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
	mysqli_set_charset($conn, "utf8");
	date_default_timezone_set("Asia/Bangkok");
	$date = date("Y_m_d_H_i_s");

    // Check connection
    if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
    } 
    
function back() {
?>
		<script>
			history.back(0);
		</script>
<?php
	}
	function alert($text) {
?>
		<script>
			alert("<?=$text?>");
		</script>
<?php
	}
	
	function censor($text) {
		$badword = ["Fuck"=> "****", "สัส" => "***"];
		return strtr($text, $badword);
	}
	
	if (!isset($_GET['user'])) {
?>
		<script>
			function go(url) {
				window.location.assign(url);	
			}
			var url = document.referrer;
		</script>
<?php
	}
?>