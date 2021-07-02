<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'examenoefening_rizwan');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


class Database {
		public function login($username, $password)
	{
		$sql = 'SELECT type_id, password FROM users WHERE username = :username';
		$statement = $this->dbh->prepare($sql);
		$statement->execute([
		'username' => $username
		]);
		$results = $statement->fetch(PDO::FETCH_ASSOC);
		if (!empty($results) && password_verify($password, $results['password']))
		{
			session_start();
			$_SESSION['logged_in_as'] = $username;
			$_SESSION['is_admin'] = $results['type_id'] === '1';
			header('Location: welcome.php');
		}
		else
			header('Location: login_incorrect.php');
	}

	private $dbh;
	public function __construct() {
		try {
			$dsn = "mysql:host=localhost;dbname=examenoefening_rizwan;charset=utf8";
			$this->dbh = new PDO($dsn, 'root', '');
		} 
		catch (\PDOException $exception) {
		exit('Unable to connect. Error message: ' . $exception->getMessage());
		}
	}

	// public function create_admin() {
	// 	$hashed_password = password_hash('admin', PASSWORD_DEFAULT);
	// 	$sql = 'INSERT INTO users VALUES (NULL, :type_id, :username, :email, :password, :created_at, NULL)';
	// 	$statement = $this->dbh->prepare($sql);
	// 	$statement->execute([
	// 		'type_id' => 1,
	// 		'username' => 'admin',
	// 		'email' => 'admin@example.org',
	// 		'password' => $hashed_password,
	// 		'created_at' => date('Y-m-d H:i:s')
	// 	]);
	// }

	// public function create_default() {
	// 	$hashed_password = password_hash('testuser', PASSWORD_DEFAULT);
	// 	$hashed_password2 = password_hash('default2', PASSWORD_DEFAULT);
	// 	$sql = 'INSERT INTO users VALUES
	// 	 (NULL, :type_id, :username, :email, :password, :created_at, NULL),
	// 	 (NULL, :type_id, :username2, :email2, :password2, :created_at, NULL)';
	// 	$statement = $this->dbh->prepare($sql);
	// 	$statement->execute([
	// 		'type_id' => 2,
	// 		'username' => 'testuser',
	// 		'email' => 'testuser@example.org',
	// 		'password' => $hashed_password,
	// 		'created_at' => date('Y-m-d H:i:s'),
	// 		'username2' => 'testuser1',
	// 		'email2' => 'testuser1@example.org',
	// 		'password2' => $hashed_password2,
	// 	]);
	// }

	public function users_overview(): array
	{
		$sql = 'SELECT username, created_at FROM users';
		$s = $this->dbh->prepare($sql);
		$s->execute();

		return $s->fetchAll(PDO::FETCH_ASSOC);
	}

};

?>
