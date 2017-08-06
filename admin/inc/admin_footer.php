	<!-- FOOTER -->
		<footer class="footer">
			<center><p class="col-md-12">
				<hr class="divider">
				Copyright &COPY; 2017 <a href="https://www.facebook.com/jahidul.haque.pathan">Jahid</a>
			</p></center>
		</footer>
<?php
 if(isset($_GET['alert'])){
 	$alert = $_GET['alert'];	
 	if($alert == '1'){
 		echo '<script>';
 		echo 'alert("You are not allowed to access this page.")';
 		echo '</script>';
 	}
 	if($alert == '2'){
 		echo '<script>';
 		echo 'alert("Ticket Assignment Updated.")';
 		echo '</script>';
 	}
 }
?>
</body>
</html>