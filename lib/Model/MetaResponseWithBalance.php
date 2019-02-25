<?php
/**
 * MetaResponseWithBalance
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
 * Karix API lets you interact with the Karix platform. It allows you to query your account, set up webhooks, send messages and buy phone numbers.
 *
 * OpenAPI spec version: 1.0
 * Contact: support@karix.io
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: unset
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Karix\Model;

use \ArrayAccess;
use \Karix\ObjectSerializer;

/**
 * MetaResponseWithBalance Class Doc Comment
 *
 * @category Class
 * @package  Karix
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class MetaResponseWithBalance implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'MetaResponseWithBalance';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'request_uuid' => 'string',
        'credits_charged' => 'BigDecimal',
        'available_credits' => 'BigDecimal'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'request_uuid' => null,
        'credits_charged' => 'number',
        'available_credits' => 'number'
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
        'request_uuid' => 'request_uuid',
        'credits_charged' => 'credits_charged',
        'available_credits' => 'available_credits'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'request_uuid' => 'setRequestUuid',
        'credits_charged' => 'setCreditsCharged',
        'available_credits' => 'setAvailableCredits'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'request_uuid' => 'getRequestUuid',
        'credits_charged' => 'getCreditsCharged',
        'available_credits' => 'getAvailableCredits'
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
        $this->container['request_uuid'] = isset($data['request_uuid']) ? $data['request_uuid'] : null;
        $this->container['credits_charged'] = isset($data['credits_charged']) ? $data['credits_charged'] : null;
        $this->container['available_credits'] = isset($data['available_credits']) ? $data['available_credits'] : null;
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
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets request_uuid
     *
     * @return string
     */
    public function getRequestUuid()
    {
        return $this->container['request_uuid'];
    }

    /**
     * Sets request_uuid
     *
     * @param string $request_uuid Unique request ID for debugging purposes
     *
     * @return $this
     */
    public function setRequestUuid($request_uuid)
    {
        $this->container['request_uuid'] = $request_uuid;

        return $this;
    }

    /**
     * Gets credits_charged
     *
     * @return BigDecimal
     */
    public function getCreditsCharged()
    {
        return $this->container['credits_charged'];
    }

    /**
     * Sets credits_charged
     *
     * @param BigDecimal $credits_charged credits_charged
     *
     * @return $this
     */
    public function setCreditsCharged($credits_charged)
    {
        $this->container['credits_charged'] = $credits_charged;

        return $this;
    }

    /**
     * Gets available_credits
     *
     * @return BigDecimal
     */
    public function getAvailableCredits()
    {
        return $this->container['available_credits'];
    }

    /**
     * Sets available_credits
     *
     * @param BigDecimal $available_credits available_credits
     *
     * @return $this
     */
    public function setAvailableCredits($available_credits)
    {
        $this->container['available_credits'] = $available_credits;

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

