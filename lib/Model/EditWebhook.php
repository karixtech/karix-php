<?php
/**
 * EditWebhook
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * karix api
 *
 * # Overview  Karix API lets you interact with the Karix platform. It allows you to query your account, set up webhooks, send messages and buy phone numbers.  # API and Clients Versioning  Karix APIs are versioned using the format vX.Y where X is the major version number and Y is minor. All minor version changes are backwards compatible but major releases are not. Please be careful when upgrading.  A new user account is pinned to the latest version at the time of first request. By default every request sent Karix is processed using that version, even if there have been subsequent breaking changes. This is done to prevent existing user applications from breaking. You can change the pinned version for your account using the account dashboard. The default API version can be overridden by specifying the header `api-version`. Note: Specifying this value will not change your pinned version for other calls.  Karix also provides HTTP API clients for all major languages. Release versions of these clients correspond to their API Version supported. Client version vX.Y.Z supports API version vX.Y. HTTP Clients are configured to use `api-version` header for that client version. When using official Karix HTTP Clients only, you dont need to concern yourself with pinned version. To upgrade your API version simply update the client.  # Common Request Structures  All Karix APIs follow a common REST format with the following resources:   - account   - message   - webhook   - number  ## Creating a resource To create a request send a `POST` request with the desired parameters in a JSON object to `/<resource>/` url. A successful response will contain the details of the single resource created with HTTP status code `201 Created`. Note: An exception to this is the `Create Message` API which is a bulk API and returns       a list of message records.  ## Fetching a resource To fetch a resource by its Unique ID send a `GET` request to `/<resource>/<uid>/` where `uid` is the Alphanumeric Unique ID of the resource. A successful response will contain the details of the single resource fetched with HTTP status code `200 OK`  ## Editing a resource To edit certain parameters of a resource send a `PATCH` request to `/<resource>/<uid>/` where `uid` is the Alphanumeric Unique ID of the resource, with a JSON object containing only the parameters which need to be updated. Edit resource APIs generally have no required parameters. A successful response will contain all the details of the single resource after editing.  ## Deleting a resource To delete a resource send a `DELETE` request to `/<resource>/<uid>/` where `uid` is the Alphanumeric Unique ID of the resource. A successful response will return HTTP status code `204 No Content` with no body.  ## Fetching a list of resources To fetch a list of resources send a `GET` request to `/<resource>/` with filters as GET parameters. A successful response will contain a list of filtered paginated objects with HTTP status code `200 OK`.  ### Pagination Pagination for list APIs are controlled using GET parameters:   - `limit`: Number of objects to be returned   - `offset`: Number of objects to skip before collecting the output list.  # Common Response Structures  All Karix APIs follow some common respose structures.  ## Success Responses  ### Single Resource Response  Responses returning a single object will have the following keys | Key           | Child Key     | Description                               | |:------------- |:------------- |:----------------------------------------- | | meta          |               | Meta Details about request and response   | |               | request_uuid  | Unique request identifier                 | | data          |               | Details of the object                     |  ### List Resource Response  Responses returning a list of objects will have the following keys | Key           | Child Key     | Description                               | |:------------- |:------------- |:----------------------------------------- | | meta          |               | Meta Details about request and response   | |               | request_uuid  | Unique request identifier                 | |               | previous      | Link to the previous page of the list     | |               | next          | Link to the next page of the list         | |               | count         | Total number of objects over all pages    | |               | limit         | Limit the API was requested with          | |               | offset        | Page Offset the API was requested with    | | objects       |               | List of objects with details              |  ## Error Responses  ### Validation Error Response  Responses for requests which failed due to validation errors will have the follwing keys: | Key           | Child Key     | Description                                | |:------------- |:------------- |:------------------------------------------ | | meta          |               | Meta Details about request and response    | |               | request_uuid  | Unique request identifier                  | | error         |               | Details for the error                      | |               | message       | Error message                              | |               | param         | (Optional) parameter this error relates to |  Validation error responses will return HTTP Status Code `400 Bad Request`  ### Insufficient Balance Response  Some requests will require to consume account credits. In case of insufficient balance the following keys will be returned: | Key           | Child Key     | Description                               | |:------------- |:------------- |:----------------------------------------- | | meta          |               | Meta Details about request and response   | |               | request_uuid  | Unique request identifier                 | | error         |               | Details for the error                     | |               | message       | `Insufficient Balance`                    |  Insufficient balance response will return HTTP Status Code `402 Payment Required`
 *
 * OpenAPI spec version: 1.0
 * Contact: support@karix.io
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.3.1
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Model;

use \ArrayAccess;
use \Swagger\Client\ObjectSerializer;

/**
 * EditWebhook Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class EditWebhook implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'EditWebhook';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'sms_notification_url' => 'string',
        'sms_notification_method' => 'string',
        'sms_notification_fallback_url' => 'string',
        'sms_notification_fallback_method' => 'string',
        'name' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'sms_notification_url' => null,
        'sms_notification_method' => null,
        'sms_notification_fallback_url' => null,
        'sms_notification_fallback_method' => null,
        'name' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'sms_notification_url' => 'sms_notification_url',
        'sms_notification_method' => 'sms_notification_method',
        'sms_notification_fallback_url' => 'sms_notification_fallback_url',
        'sms_notification_fallback_method' => 'sms_notification_fallback_method',
        'name' => 'name'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'sms_notification_url' => 'setSmsNotificationUrl',
        'sms_notification_method' => 'setSmsNotificationMethod',
        'sms_notification_fallback_url' => 'setSmsNotificationFallbackUrl',
        'sms_notification_fallback_method' => 'setSmsNotificationFallbackMethod',
        'name' => 'setName'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'sms_notification_url' => 'getSmsNotificationUrl',
        'sms_notification_method' => 'getSmsNotificationMethod',
        'sms_notification_fallback_url' => 'getSmsNotificationFallbackUrl',
        'sms_notification_fallback_method' => 'getSmsNotificationFallbackMethod',
        'name' => 'getName'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['sms_notification_url'] = isset($data['sms_notification_url']) ? $data['sms_notification_url'] : null;
        $this->container['sms_notification_method'] = isset($data['sms_notification_method']) ? $data['sms_notification_method'] : null;
        $this->container['sms_notification_fallback_url'] = isset($data['sms_notification_fallback_url']) ? $data['sms_notification_fallback_url'] : null;
        $this->container['sms_notification_fallback_method'] = isset($data['sms_notification_fallback_method']) ? $data['sms_notification_fallback_method'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        return true;
    }


    /**
     * Gets sms_notification_url
     *
     * @return string
     */
    public function getSmsNotificationUrl()
    {
        return $this->container['sms_notification_url'];
    }

    /**
     * Sets sms_notification_url
     *
     * @param string $sms_notification_url API url to notify in case of inbound message
     *
     * @return $this
     */
    public function setSmsNotificationUrl($sms_notification_url)
    {
        $this->container['sms_notification_url'] = $sms_notification_url;

        return $this;
    }

    /**
     * Gets sms_notification_method
     *
     * @return string
     */
    public function getSmsNotificationMethod()
    {
        return $this->container['sms_notification_method'];
    }

    /**
     * Sets sms_notification_method
     *
     * @param string $sms_notification_method HTTP method to use for notifying API url in case of inbound message
     *
     * @return $this
     */
    public function setSmsNotificationMethod($sms_notification_method)
    {
        $this->container['sms_notification_method'] = $sms_notification_method;

        return $this;
    }

    /**
     * Gets sms_notification_fallback_url
     *
     * @return string
     */
    public function getSmsNotificationFallbackUrl()
    {
        return $this->container['sms_notification_fallback_url'];
    }

    /**
     * Sets sms_notification_fallback_url
     *
     * @param string $sms_notification_fallback_url In case the service for `sms_notification_url` is down Karix will hit the fallback url with the incoming message details
     *
     * @return $this
     */
    public function setSmsNotificationFallbackUrl($sms_notification_fallback_url)
    {
        $this->container['sms_notification_fallback_url'] = $sms_notification_fallback_url;

        return $this;
    }

    /**
     * Gets sms_notification_fallback_method
     *
     * @return string
     */
    public function getSmsNotificationFallbackMethod()
    {
        return $this->container['sms_notification_fallback_method'];
    }

    /**
     * Sets sms_notification_fallback_method
     *
     * @param string $sms_notification_fallback_method HTTP method to use for fallback notification url
     *
     * @return $this
     */
    public function setSmsNotificationFallbackMethod($sms_notification_fallback_method)
    {
        $this->container['sms_notification_fallback_method'] = $sms_notification_fallback_method;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name Display name of the webhook
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


