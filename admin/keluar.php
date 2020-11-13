<?php
$_SESSION = [];
session_unset();
session_destroy();
    
echo "
		<div class='container-fluid'>
			<div class='row'>
				<div class='col-lg-12'>
					<center>
						<img src='gambar/loading2.gif'>
						<h2 class='page-header' style='display: inline-block;'>
							Loading. . . . .
						</h2>
					</center>
				</div>
			</div>
		</div>
		";

    echo "<meta http-equiv ='refresh'content='1; url=admin'>";
?>