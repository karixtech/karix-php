<?php
/**
 * Account
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
 * Account Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Account implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Account';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'name' => 'string',
        'status' => 'string',
        'uid' => 'string',
        'token' => 'string',
        'is_parent' => 'bool',
        'created_time' => '\DateTime',
        'updated_time' => '\DateTime',
        'account_type' => 'string',
        'credit_balance' => 'BigDecimal',
        'auto_recharge' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'name' => null,
        'status' => null,
        'uid' => null,
        'token' => null,
        'is_parent' => null,
        'created_time' => 'date-time',
        'updated_time' => 'date-time',
        'account_type' => null,
        'credit_balance' => 'number',
        'auto_recharge' => null
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
        'name' => 'name',
        'status' => 'status',
        'uid' => 'uid',
        'token' => 'token',
        'is_parent' => 'is_parent',
        'created_time' => 'created_time',
        'updated_time' => 'updated_time',
        'account_type' => 'account_type',
        'credit_balance' => 'credit_balance',
        'auto_recharge' => 'auto_recharge'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'status' => 'setStatus',
        'uid' => 'setUid',
        'token' => 'setToken',
        'is_parent' => 'setIsParent',
        'created_time' => 'setCreatedTime',
        'updated_time' => 'setUpdatedTime',
        'account_type' => 'setAccountType',
        'credit_balance' => 'setCreditBalance',
        'auto_recharge' => 'setAutoRecharge'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'status' => 'getStatus',
        'uid' => 'getUid',
        'token' => 'getToken',
        'is_parent' => 'getIsParent',
        'created_time' => 'getCreatedTime',
        'updated_time' => 'getUpdatedTime',
        'account_type' => 'getAccountType',
        'credit_balance' => 'getCreditBalance',
        'auto_recharge' => 'getAutoRecharge'
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

    const STATUS_ENABLED = 'enabled';
    const STATUS_SUSPENDED = 'suspended';
    const STATUS_DISABLED = 'disabled';
    const ACCOUNT_TYPE_PREPAID = 'prepaid';
    const ACCOUNT_TYPE_POSTPAID = 'postpaid';
    const ACCOUNT_TYPE_TRIAL = 'trial';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_ENABLED,
            self::STATUS_SUSPENDED,
            self::STATUS_DISABLED,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAccountTypeAllowableValues()
    {
        return [
            self::ACCOUNT_TYPE_PREPAID,
            self::ACCOUNT_TYPE_POSTPAID,
            self::ACCOUNT_TYPE_TRIAL,
        ];
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
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['uid'] = isset($data['uid']) ? $data['uid'] : null;
        $this->container['token'] = isset($data['token']) ? $data['token'] : null;
        $this->container['is_parent'] = isset($data['is_parent']) ? $data['is_parent'] : null;
        $this->container['created_time'] = isset($data['created_time']) ? $data['created_time'] : null;
        $this->container['updated_time'] = isset($data['updated_time']) ? $data['updated_time'] : null;
        $this->container['account_type'] = isset($data['account_type']) ? $data['account_type'] : null;
        $this->container['credit_balance'] = isset($data['credit_balance']) ? $data['credit_balance'] : null;
        $this->container['auto_recharge'] = isset($data['auto_recharge']) ? $data['auto_recharge'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['name']) && (strlen($this->container['name']) > 200)) {
            $invalidProperties[] = "invalid value for 'name', the character length must be smaller than or equal to 200.";
        }

        $allowedValues = $this->getStatusAllowableValues();
        if (!in_array($this->container['status'], $allowedValues)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'status', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getAccountTypeAllowableValues();
        if (!in_array($this->container['account_type'], $allowedValues)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'account_type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

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

        if (strlen($this->container['name']) > 200) {
            return false;
        }
        $allowedValues = $this->getStatusAllowableValues();
        if (!in_array($this->container['status'], $allowedValues)) {
            return false;
        }
        $allowedValues = $this->getAccountTypeAllowableValues();
        if (!in_array($this->container['account_type'], $allowedValues)) {
            return false;
        }
        return true;
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
     * @param string $name Name of the account. Must be unique within the parent account.
     *
     * @return $this
     */
    public function setName($name)
    {
        if (!is_null($name) && (strlen($name) > 200)) {
            throw new \InvalidArgumentException('invalid length for $name when calling Account., must be smaller than or equal to 200.');
        }

        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status Status of your account. Possible values are:   - enabled: Account is ready to be used   - suspended: Account has been temporarily suspended   - disabled: Account has been permanently disabled and             cannot be revived. All resources allocated             to the subaccount like phonenumbers are also             deleted.
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($status) && !in_array($status, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'status', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets uid
     *
     * @return string
     */
    public function getUid()
    {
        return $this->container['uid'];
    }

    /**
     * Sets uid
     *
     * @param string $uid Alphanumeric user identification. Used as username for Basic Authentication
     *
     * @return $this
     */
    public function setUid($uid)
    {
        $this->container['uid'] = $uid;

        return $this;
    }

    /**
     * Gets token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->container['token'];
    }

    /**
     * Sets token
     *
     * @param string $token Token password for this account. Used as password in Basic Authentication
     *
     * @return $this
     */
    public function setToken($token)
    {
        $this->container['token'] = $token;

        return $this;
    }

    /**
     * Gets is_parent
     *
     * @return bool
     */
    public function getIsParent()
    {
        return $this->container['is_parent'];
    }

    /**
     * Sets is_parent
     *
     * @param bool $is_parent There is generally only one parent account in list. Rest are child subaccounts. Possible values:   - `true`: If the account is a parent account   - `false`: If the account is a subaccount of the parent account
     *
     * @return $this
     */
    public function setIsParent($is_parent)
    {
        $this->container['is_parent'] = $is_parent;

        return $this;
    }

    /**
     * Gets created_time
     *
     * @return \DateTime
     */
    public function getCreatedTime()
    {
        return $this->container['created_time'];
    }

    /**
     * Sets created_time
     *
     * @param \DateTime $created_time Date when this account was created
     *
     * @return $this
     */
    public function setCreatedTime($created_time)
    {
        $this->container['created_time'] = $created_time;

        return $this;
    }

    /**
     * Gets updated_time
     *
     * @return \DateTime
     */
    public function getUpdatedTime()
    {
        return $this->container['updated_time'];
    }

    /**
     * Sets updated_time
     *
     * @param \DateTime $updated_time Date when this account was last updated
     *
     * @return $this
     */
    public function setUpdatedTime($updated_time)
    {
        $this->container['updated_time'] = $updated_time;

        return $this;
    }

    /**
     * Gets account_type
     *
     * @return string
     */
    public function getAccountType()
    {
        return $this->container['account_type'];
    }

    /**
     * Sets account_type
     *
     * @param string $account_type Signifies whether the account is prepaid, postpaid or trial
     *
     * @return $this
     */
    public function setAccountType($account_type)
    {
        $allowedValues = $this->getAccountTypeAllowableValues();
        if (!is_null($account_type) && !in_array($account_type, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'account_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['account_type'] = $account_type;

        return $this;
    }

    /**
     * Gets credit_balance
     *
     * @return BigDecimal
     */
    public function getCreditBalance()
    {
        return $this->container['credit_balance'];
    }

    /**
     * Sets credit_balance
     *
     * @param BigDecimal $credit_balance Account's credit balance in US dollars.   - For postpaid accounts this value will be `null`.   - For subaccounts this value will reflect balance of parent account
     *
     * @return $this
     */
    public function setCreditBalance($credit_balance)
    {
        $this->container['credit_balance'] = $credit_balance;

        return $this;
    }

    /**
     * Gets auto_recharge
     *
     * @return bool
     */
    public function getAutoRecharge()
    {
        return $this->container['auto_recharge'];
    }

    /**
     * Sets auto_recharge
     *
     * @param bool $auto_recharge Whether auto-recharge has been enabled.
     *
     * @return $this
     */
    public function setAutoRecharge($auto_recharge)
    {
        $this->container['auto_recharge'] = $auto_recharge;

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


