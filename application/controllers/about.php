<?php
	class about extends Controller {
		function __construct() {
			//echo "<h2>About constructor </h2>";
		}
		function index() {
			//echo "About index action";
			$this->view("index");
		}
	}
?>