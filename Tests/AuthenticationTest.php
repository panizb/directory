<?php
require_once __DIR__ . '/../Authentication.php';
class AuthenticationTest extends PHPUnit_Framework_TestCase
{
    // ...
     /**
     * @expectedException        Exception
     * @expectedExceptionMessage No such user exist.
     */
    public function testExceptionUser()
    {
        // Arrange
        $username = "gholi";
        $idToken ="kfjkjdsk";
        $obj = new directory\Authentication();

        // Act
        $res = $obj->isAMember($username, $idToken);

        // Assert
        $this->assertEquals(0, $res);
    }
     /**
     * @expectedException        Exception
     * @expectedExceptionMessage Error Recieving userID
     */
    public function testExceptionArgument1()
    {
        // Arrange
        $username = "";
        $idToken ="kfjkjdsk";
        $obj = new directory\Authentication();

        // Act
        $res = $obj->isAMember($username, $idToken);

        // Assert
        $this->assertEquals(0, $res);
    }
     /**
     * @expectedException        Exception
     * @expectedExceptionMessage Error Recieving id_token
     */
    public function testExceptionArgument2()
    {
        // Arrange
        $username = "ali";
        $idToken ="";
        $obj = new directory\Authentication();

        // Act
        $res = $obj->isAMember($username, $idToken);

        // Assert
        $this->assertEquals(0, $res);
    }
    public function testUser()
    {
        // Arrange
        $username = "ali";
        $idToken ="kfjkjdsk";
        $obj = new directory\Authentication();

        // Act
        $res = $obj->isAMember($username, $idToken);
 
        // Assert
        $this->assertEquals(1, $res);
    }
    // ...
}
