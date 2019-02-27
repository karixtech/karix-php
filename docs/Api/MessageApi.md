# Karix\MessageApi

All URIs are relative to *https://api.karix.io*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getMessage**](MessageApi.md#getMessage) | **GET** /message/ | Get list of messages sent or received
[**getMessageById**](MessageApi.md#getMessageById) | **GET** /message/{uid}/ | Get message details by id.
[**sendMessage**](MessageApi.md#sendMessage) | **POST** /message/ | Send a message to a list of phone numbers


# **getMessage**
> \Karix\Model\MessageListResponse getMessage($direction, $account_uid, $state, $offset, $limit)

Get list of messages sent or received

Get list of messages sent or received. Sorted by descending order of `queued_time` (latest messages are first)

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Karix\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Karix\Api\MessageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$direction = "direction_example"; // string | Message direction, inbound or outbound to filter on. If not provided, the filter is not applied.
$account_uid = "account_uid_example"; // string | Filter the result list by the account which sent the message - If not provided or `null` or empty string, no filter will be placed   and all the messages by the main account and its subaccounts are returned - To get the list of messages sent by main account only, set `account_uid`   to main account's uid.
$state = "state_example"; // string | Filter the result on the basis of message state.
$offset = 0; // int | The number of items to skip before starting to collect the result set.
$limit = 10; // int | The numbers of items to return.

try {
    $result = $apiInstance->getMessage($direction, $account_uid, $state, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessageApi->getMessage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **direction** | **string**| Message direction, inbound or outbound to filter on. If not provided, the filter is not applied. | [optional]
 **account_uid** | **string**| Filter the result list by the account which sent the message - If not provided or &#x60;null&#x60; or empty string, no filter will be placed   and all the messages by the main account and its subaccounts are returned - To get the list of messages sent by main account only, set &#x60;account_uid&#x60;   to main account&#39;s uid. | [optional]
 **state** | **string**| Filter the result on the basis of message state. | [optional]
 **offset** | **int**| The number of items to skip before starting to collect the result set. | [optional] [default to 0]
 **limit** | **int**| The numbers of items to return. | [optional] [default to 10]

### Return type

[**\Karix\Model\MessageListResponse**](../Model/MessageListResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getMessageById**
> \Karix\Model\MessageResponse getMessageById($uid)

Get message details by id.

Get message details by id.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Karix\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Karix\Api\MessageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$uid = "uid_example"; // string | Alphanumeric ID of the message to get.

try {
    $result = $apiInstance->getMessageById($uid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessageApi->getMessageById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **uid** | **string**| Alphanumeric ID of the message to get. |

### Return type

[**\Karix\Model\MessageResponse**](../Model/MessageResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **sendMessage**
> \Karix\Model\MessageCreatedResponse sendMessage($message)

Send a message to a list of phone numbers

Send a message to a list of destinations.   - A successful `202` response means that a message record has been created in Karix.     It does not mean that each message was successfully `queued`, `sent` or `delivered`.   - To know the status of the message check the parameter `status` of the message record.   - Message records might be created with a `failed` state due issues with Karix or     validation issues. Please check `error` to know the reason of the failure.     No balance is deducted and `total_cost` is always zero for such cases.   - Message records might be updated to state `undelivered`. This is due to carrier/operator     related issues. Please check `error` to know the reason of the failure.     Balance is still deducted for such cases.   - Since this is a bulk API the response structure follows the List Response format     rather than the Single Response format.   - Once queued, the messages for your account are dequeued and processed at a     rate set for your account (defaults to 5 messages per second).     Contact [sales](support@karix.io) to get your rate limit increased.   - For fair usage, there is no rate limiting for queueing messages using this     API. Dequeue rate would still be applicable as stated.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Karix\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Karix\Api\MessageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$message = new \Karix\Model\CreateMessage(); // \Karix\Model\CreateMessage | Create Message object

try {
    $result = $apiInstance->sendMessage($message);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessageApi->sendMessage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **message** | [**\Karix\Model\CreateMessage**](../Model/CreateMessage.md)| Create Message object |

### Return type

[**\Karix\Model\MessageCreatedResponse**](../Model/MessageCreatedResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

