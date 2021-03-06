<?php
/**
 * MessageErrorTest
 *
 * PHP version 5
 *
 * @category Class
 * @package  Karix
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * karix api
 *
 * Karix API lets you interact with the Karix platform using an omnichannel messaging API. It also allows you to query your account, set up webhooks and buy phone numbers.
 *
 * OpenAPI spec version: 2.0
 * Contact: support@karix.io
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: unset
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Please update the test case below to test the model.
 */

namespace Karix;

/**
 * MessageErrorTest Class Doc Comment
 *
 * @category    Class
 * @description Non-null in case of a failure to send the message.
 * @package     Karix
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class MessageErrorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Setup before running any test case
     */
    public static function setUpBeforeClass()
    {
    }

    /**
     * Setup before running each test case
     */
    public function setUp()
    {
    }

    /**
     * Clean up after running each test case
     */
    public function tearDown()
    {
    }

    /**
     * Clean up after running all test cases
     */
    public static function tearDownAfterClass()
    {
    }

    /**
     * Test "MessageError"
     */
    public function testMessageError()
    {
    }

    /**
     * Test attribute "code"
     */
    public function testPropertyCode()
    {
        $message_error = new \Karix\Model\MessageError();
        $code = "example value";
        
        $message_error->setCode($code);
        $this->assertEquals($code, $message_error->getCode());

    }

    /**
     * Test attribute "message"
     */
    public function testPropertyMessage()
    {
        $message_error = new \Karix\Model\MessageError();
        $message = "example value";
        
        $message_error->setMessage($message);
        $this->assertEquals($message, $message_error->getMessage());

    }

    /**
    * Helper to create a good example of model
    */
    public function getGoodExample()
    {
        $code = "example value";
        
        $message = "example value";
        
        return array(
            "code" => $code,
            "message" => $message,
        );
    }

    /**
    * Test MessageError validation
    */
    public function testValidation()
    {
        $example = $this->getGoodExample();
        $message_error = new \Karix\Model\MessageError($example);
        $this->assertTrue($message_error->valid());
    }

    /**
    *
    */
    public function testRequiredPropertyCode()
    {
        $example = $this->getGoodExample();
        $example['code'] = null;
        $message_error = new \Karix\Model\MessageError($example);
        $this->assertFalse($message_error->valid());

        $invalidProperties = $message_error->listInvalidProperties();
        $this->assertContains("'code' can't be null", $invalidProperties);
    }

    /**
    *
    */
    public function testRequiredPropertyMessage()
    {
        $example = $this->getGoodExample();
        $example['message'] = null;
        $message_error = new \Karix\Model\MessageError($example);
        $this->assertFalse($message_error->valid());

        $invalidProperties = $message_error->listInvalidProperties();
        $this->assertContains("'message' can't be null", $invalidProperties);
    }

}
