<?php

namespace DB;
use \PDO;

class DBHandler
{
    public $conn;
	public function connect ()
	{
		$servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'directory';
		try {
    $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

	}
    public function ExecuteWithReturn($Query, array $params = [])
    {
        $sth = $this->conn->prepare($Query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute($params);
        return $sth->fetchAll();
    }

// $sth = $conn->prepare('UPDATE user SET password = :pwd, email = :email WHERE id = :user_id');
// $sth->execute([
//     'pwd' => ,
//     'email' => 'email@example.com',
//     'user_id' => 1234,
// ]);

// $sth = $conn->prepare('DELETE FROM user WHERE id = :user_id');
// $sth->execute([
//     'user_id' => 1234,
// ]);

// function something($query, array $params = []) {
//     $sth = $conn->prepare($query);
//     $sth->execute($params);
// }




// $db->ExecuteNoReturn('SELECT 1 FROM table WHERE param1 = :param1Value', ['param1Value' => time()])
// $db->ExecuteNoReturn(
//     'SELECT 1 FROM table WHERE param1 = :param1Value AND password = :pwd', 
//     [
//         'param1Value' => time(),
//         // 'pwd'         => 'something',
//     ]
// )

// SELECT 1 FROM table WHERE param1 = '1234566' AND password = 'something'
// SELECT 1 FROM table WHERE param1 = '1234566' AND password = :pwd










} 