<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
/*header('Content-Type: application/json; charset=utf-8');*/
		/**
		* by Nazrul
		*/
		class Config 
		{
			private $conn="";
			private $username,$password;

			public function __construct()
			{
				$this->username="0fe_17209400";
				$this->password="id10103012";
				try {
					    $this->conn = new PDO('mysql:host=sql307.0fees.us;dbname=0fe_17209400_db', $this->username, $this->password);
					    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					} catch(PDOException $e) {
					    echo 'ERROR: ' . $e->getMessage();
					}
			}

			public function SetUserLatLng()
			{
				$params =json_decode(file_get_contents('php://input'));

				try
				 {				 
				  $stmt = $this->conn->prepare('INSERT INTO ttravelgpslog(id_admin,gps_lat,gps_long)VALUES(:id_admin,:gps_lat,:gps_long)');
				  $stmt->execute(array(
				    ':id_admin' => 10,
				    ':gps_lat'=>$params->lat,
				    ':gps_long'=>$params->lng
				  ));
				 
				  # Affected Rows?
				  echo $stmt->rowCount(); // 1
				} catch(PDOException $e) {
				  echo 'Error: ' . $e->getMessage();
				}
			}

			public function GetContactData()
			{
				$id = 5;
				try
				{
				  $stmt = $this->conn->prepare('SELECT * FROM tb_contact');
				  $stmt->execute();
				  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				 $arr=array();
				  if ( count($result) )
				   { 
				     foreach($result as $row) 
				     { 
				      	$arr[]=$row;
				     }   
				      echo json_encode($arr);
				  } else 
				  {
				    echo 0;
				  }

				} catch(PDOException $e) {
				    echo 'ERROR: ' . $e->getMessage();
				}
			}
			public function Delete()
			{	 
			  $id=1;
			  $stmt = $this->conn->prepare('DELETE FROM main_category WHERE main_category_id = :id');
			  $stmt->bindParam(':id', $id); 
			  $stmt->execute();
			  echo $stmt->rowCount();
			}
			public function loginAuth()
			{
				$params =json_decode(file_get_contents('php://input'));

				try
				{
				  $stmt = $this->conn->prepare('SELECT * FROM user WHERE username = :username AND password= :password');
				  $stmt->execute(array('username' => $params->email,'password'=>md5($params->password)));
			      $num_rows = $stmt->fetchColumn();
				 
				  if ( $num_rows>0 ) { 
					 $row = $stmt->fetch();
					 $arr =array("status"=>1,"userid"=>$row["id"]);
					 echo json_encode($arr);
				  } else {
				  	 $arr =array("status"=>0,"msg"=>"No rows returned");
					 echo json_encode($arr);
				  }
				} catch(PDOException $e) {
				     $arr =array("status"=>0,"msg"=>$e->getMessage());
					 echo json_encode($arr);
				}
			}

		}


		$instance = new Config();
		$instanceMethod = $_REQUEST['fname'];
		$instance->$instanceMethod();

?>