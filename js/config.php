<?php
define("__HOST__", "localhost");
define("__USER__", "root");
define("__PASS__", "root");
define("__BASE__", "practice");
class DB {
	private $con = false;
	private $data = array();
	public function __construct() {
		$this->con = new mysqli(__HOST__, __USER__, __PASS__, __BASE__);
			
		if(mysqli_connect_errno()) {
			die("DB connection failed:" . mysqli_connect_error());
		}
	}
	public function qryPop() {
		$sql = "SELECT * FROM `blogs` ORDER BY `id` DESC";
		
		$qry = $this->con->query($sql);
		if($qry->num_rows > 0) {
			while($row = $qry->fetch_object()) {
				$this->data[] = $row;
			}
		} else {
			$this->data[] = null;
		}
		$this->con->close();
	}
	public function qryFire($sql=null) {
		if($sql == null) {
			$this->qryPop();
		} else {
			$this->con->query($sql);
			$this->qryPop();
		}
		$this->con->close();
		return $this->data;
	}
	public function qryPup() {
		$id= $_GET['id'];
		$sql = "SELECT * FROM blogs WHERE id='$id'";
	
		$qry = $this->con->query($sql);
		if($qry->num_rows > 0) {
			while($row = $qry->fetch_object()) {
				$this->data[] = $row;
			}
		} else {
			$this->data[] = null;
		}
		$this->con->close();
	}
	public function qryIce($sql=null) {
		if($sql == null) {
			$this->qryPup();
		} else {
			$this->con->query($sql);
			$this->qryPup();
		}
		$this->con->close();
		return $this->data;
	}
	public function qryPupName() {
		$name= $_GET['name'];
		$sql = "SELECT * FROM blogs WHERE name LIKE '$name%'";
	
	
		$qry = $this->con->query($sql);
		if($qry->num_rows > 0) {
			while($row = $qry->fetch_object()) {
				$this->data[] = $row;
			}
		} else {
			$this->data[] = null;
		}
		$this->con->close();
	}
	public function qryWind($sql=null) {
		if($sql == null) {
			$this->qryPupName();
		} else {
			$this->con->query($sql);
			$this->qryPupName();
		}
		$this->con->close();
		return $this->data;
	}
}

?>