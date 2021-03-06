<?php
/**
 * WebhookTest
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
 * WebhookTest Class Doc Comment
 *
 * @category    Class
 * @description Webhook
 * @package     Karix
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class WebhookTest extends \PHPUnit_Framework_TestCase
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
     * Test "Webhook"
     */
    public function testWebhook()
    {
    }

    /**
     * Test attribute "events_url"
     */
    public function testPropertyEventsUrl()
    {
        $webhook = new \Karix\Model\Webhook();
        $events_url = "https://events.example.com/sms";
        
        $webhook->setEventsUrl($events_url);
        $this->assertEquals($events_url, $webhook->getEventsUrl());

    }

    /**
     * Test attribute "name"
     */
    public function testPropertyName()
    {
        $webhook = new \Karix\Model\Webhook();
        $name = "webhook_1";
        
        $webhook->setName($name);
        $this->assertEquals($name, $webhook->getName());

    }

    /**
     * Test attribute "uid"
     */
    public function testPropertyUid()
    {
        $webhook = new \Karix\Model\Webhook();
        $uid = "3e4e654c-f4ad-430d-b41e-d71068ecf948";
        
        $webhook->setUid($uid);
        $this->assertEquals($uid, $webhook->getUid());

    }

    /**
     * Test attribute "created_time"
     */
    public function testPropertyCreatedTime()
    {
        $webhook = new \Karix\Model\Webhook();
        $datetime = \DateTime::createFromFormat(\DateTime::ISO8601, '2017-08-04T09:59:29.660Z');
        $created_time = $datetime;
        
        $webhook->setCreatedTime($created_time);
        $this->assertEquals($created_time, $webhook->getCreatedTime());

    }

    /**
     * Test attribute "updated_time"
     */
    public function testPropertyUpdatedTime()
    {
        $webhook = new \Karix\Model\Webhook();
        $datetime = \DateTime::createFromFormat(\DateTime::ISO8601, '2017-08-05T09:59:29.660Z');
        $updated_time = $datetime;
        
        $webhook->setUpdatedTime($updated_time);
        $this->assertEquals($updated_time, $webhook->getUpdatedTime());

    }

    /**
     * Test attribute "account_uid"
     */
    public function testPropertyAccountUid()
    {
        $webhook = new \Karix\Model\Webhook();
        $account_uid = "5a507caf-0769-4914-a7f7-54f5a064b52a";
        
        $webhook->setAccountUid($account_uid);
        $this->assertEquals($account_uid, $webhook->getAccountUid());

    }

    /**
    * Helper to create a good example of model
    */
    public function getGoodExample()
    {
        $events_url = "https://events.example.com/sms";
        
        $name = "webhook_1";
        
        $uid = "3e4e654c-f4ad-430d-b41e-d71068ecf948";
        
        $datetime = \DateTime::createFromFormat(\DateTime::ISO8601, '2017-08-04T09:59:29.660Z');
        $created_time = $datetime;
        
        $datetime = \DateTime::createFromFormat(\DateTime::ISO8601, '2017-08-05T09:59:29.660Z');
        $updated_time = $datetime;
        
        $account_uid = "5a507caf-0769-4914-a7f7-54f5a064b52a";
        
        return array(
            "events_url" => $events_url,
            "name" => $name,
            "uid" => $uid,
            "created_time" => $created_time,
            "updated_time" => $updated_time,
            "account_uid" => $account_uid,
        );
    }

    /**
    * Test Webhook validation
    */
    public function testValidation()
    {
        $example = $this->getGoodExample();
        $webhook = new \Karix\Model\Webhook($example);
        $this->assertTrue($webhook->valid());
    }

}
