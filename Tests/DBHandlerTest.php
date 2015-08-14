<?php

include('../DBHandler.php');

class DBHandlerTest extends \PHPUnit_Framework_TestCase
{
    // ...

    public function testCanBeNegated()
    {
        // Arrange
        $myDB = new DB\DBHandler();

        // Act
        $myDB->connect();
        $query= "SELECT * from Employee";
        $params= array ();
        $res=$myDB->executeWithReturn($query, $params);

        // Assert
        $this->assertNotEmpty($res);
    }
}
