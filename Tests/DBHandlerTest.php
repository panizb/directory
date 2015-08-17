<?php

require_once __DIR__ . '/../DBHandler.php';

/**
 * These are required to ensure that the PDO object in the class is able to work correctly
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class DataPumpTest extends PHPUnit_Extensions_Database_TestCase
{

    /**
     * This is the object that will be tested
     * @var DataPump
     */
    protected $object;
    
    /**
     * only instantiate pdo once for test clean-up/fixture load
     * @var PDO
     */
    static private $pdo = null;

    /**
     * only instantiate PHPUnit_Extensions_Database_DB_IDatabaseConnection once per test
     * @var type 
     */
    private $conn = null;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new DB\DBHandler();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        
    }
    
    protected function getConnection()
    {
        if ($this->conn === null) {
            if (self::$pdo == null) {
                $servername = 'localhost';
                $username = 'root';
                $password = '';
                $dbname = 'directory';
                self::$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, $dbname);
        }
        return $this->conn;
    }

    protected function getDataSet()
    {
        return $this->createMySQLXMLDataSet(__DIR__ . '/data.xml');
    }

    /**
     * This is here to ensure that the database is working correctly
     */
    public function testDataBaseConnection()
    {
        
        $this->getConnection()->createDataSet(array('Employee'));
        $prod = $this->getDataSet();
        $queryTable = $this->getConnection()->createQueryTable(
            'Employee',
            'SELECT * FROM Employee'
        );
        $expectedTable = $this->getDataSet()->getTable('Employee');
        //Here we check that the table in the database matches the data in the XML file
        $this->assertTablesEqual($expectedTable, $queryTable);
    }
    /**
     * This is where you can put your actual tests
     */
}

// include('../DBHandler.php');

// class DBHandlerTest extends PHPUnit_Extensions_Database_TestCase
// {
//     // ...

//     public function testDBHandler()
//     {
        // // Arrange
        // $myDB = new DB\DBHandler();

        // // Act
        // $myDB->connect();
        // $query= "SELECT * from Employee";
        // $params= array ();
        // $res=$myDB->executeWithReturn($query, $params);

        // // Assert
        // $this->assertNotEmpty($res);
   // }
    // /**
    //  * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
    //  */
    // public function getConnection()
    // {
    //     $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //     return $this->createDefaultDBConnection($pdo, ':memory:');
    // }

    // /**
    //  * @return PHPUnit_Extensions_Database_DataSet_IDataSet
    //  */
    // public function getDataSet()
    // {
    //     return $this->createFlatXMLDataSet(dirname(__FILE__).'/_files/guestbook-seed.xml');
    // }
    // public function testAddEntry()
    // {
    //     //$this->assertEquals(2, $this->getConnection()->getRowCount('guestbook'), "Pre-Condition");

    //     $myDB = new DB\DBHandler();
    //     $query= "SELECT * from Employee";
    //     $params= array ();
    //     $res=$myDB->executeWithReturn($query, $params);
    //     $this->assertEquals($res, $this->getConnection()->createQueryTable('guestbook'), "Inserting failed");
    // }

//}
