 <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="http://www.carqueryapi.com/js/carquery.0.3.4.js"></script>
<?php
if (!empty ($custom_scripts))	
{
	echo '<script>';
	echo $custom_scripts;
	echo '</script>';
}
?>
</body>
</html>