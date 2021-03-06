<?php
/**
 * PhoneNumberRateTest
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
 * PhoneNumberRateTest Class Doc Comment
 *
 * @category    Class
 * @description PhoneNumberRate
 * @package     Karix
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class PhoneNumberRateTest extends \PHPUnit_Framework_TestCase
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
     * Test "PhoneNumberRate"
     */
    public function testPhoneNumberRate()
    {
    }

    /**
     * Test attribute "inbound_sms"
     */
    public function testPropertyInboundSms()
    {
        $phone_number_rate = new \Karix\Model\PhoneNumberRate();
        $inbound_sms = "0.03";
        
        $phone_number_rate->setInboundSms($inbound_sms);
        $this->assertEquals($inbound_sms, $phone_number_rate->getInboundSms());

    }

    /**
     * Test attribute "rental"
     */
    public function testPropertyRental()
    {
        $phone_number_rate = new \Karix\Model\PhoneNumberRate();
        $rental = "0.8";
        
        $phone_number_rate->setRental($rental);
        $this->assertEquals($rental, $phone_number_rate->getRental());

    }

    /**
     * Test attribute "setup"
     */
    public function testPropertySetup()
    {
        $phone_number_rate = new \Karix\Model\PhoneNumberRate();
        $setup = "0.8";
        
        $phone_number_rate->setSetup($setup);
        $this->assertEquals($setup, $phone_number_rate->getSetup());

    }

    /**
    * Helper to create a good example of model
    */
    public function getGoodExample()
    {
        $inbound_sms = "0.03";
        
        $rental = "0.8";
        
        $setup = "0.8";
        
        return array(
            "inbound_sms" => $inbound_sms,
            "rental" => $rental,
            "setup" => $setup,
        );
    }

    /**
    * Test PhoneNumberRate validation
    */
    public function testValidation()
    {
        $example = $this->getGoodExample();
        $phone_number_rate = new \Karix\Model\PhoneNumberRate($example);
        $this->assertTrue($phone_number_rate->valid());
    }

}
