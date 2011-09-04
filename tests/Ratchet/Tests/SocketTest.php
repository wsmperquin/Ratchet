<?php
namespace Ratchet\Tests;
use Ratchet\Tests\Mock\Socket;

/**
 * @covers Ratchet\Socket
 */
class SocketTest extends \PHPUnit_Framework_TestCase {
    protected $_socket;

    protected static function getMethod($name) {
        $class  = new \ReflectionClass('\\Ratchet\\Tests\\Mock\\Socket');
        $method = $class->getMethod($name);
        $method->setAccessible(true);

        return $method;
    }

    public function setUp() {
        $this->_socket = new Socket();
    }

    public function testGetConfigForConstruct() {
        $ref_conf = static::getMethod('getConfig');
        $config   = $ref_conf->invokeArgs($this->_socket, Array());

        $this->assertEquals(array_values(Socket::$_defaults), $config);
    }
}