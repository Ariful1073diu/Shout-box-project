<?php 
$path = realpath(__DIR__);
include_once $path."/../lib/Database.php";

Class Shout{
	private $db;

	public function __construct(){
		$this->db = new Database();
	}

	public function getAllData(){
		$query = "SELECT * FROM tbl_box order by id desc";
		$result = $this->db->SELECT($query);
		return $result;
	}

	public function insertData($data){
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
		$body = mysqli_real_escape_string($this->db->link, $data['body']);
		date_default_timezone_get('Asia/Dhaka');
		$time = date('h:i:s a', time());

		$query = "INSERT INTO tbl_box(name, body, time) VALUES('$name', '$body', '$time')";
		$this->db->insert($query);
		header("Location:index.php");
	}
}
?>