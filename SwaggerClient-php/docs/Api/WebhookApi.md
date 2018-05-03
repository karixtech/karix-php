# Swagger\Client\WebhookApi

All URIs are relative to *https://api.karix.io*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createWebhook**](WebhookApi.md#createWebhook) | **POST** /webhook/ | Create webhooks to receive Message
[**deleteWebhookById**](WebhookApi.md#deleteWebhookById) | **DELETE** /webhook/{uid}/ | Delete a webhook by ID
[**getWebhook**](WebhookApi.md#getWebhook) | **GET** /webhook/ | Get a list of your webhooks
[**getWebhookById**](WebhookApi.md#getWebhookById) | **GET** /webhook/{uid}/ | Get a webhook by ID
[**patchWebhook**](WebhookApi.md#patchWebhook) | **PATCH** /webhook/{uid}/ | Edit a webhook


# **createWebhook**
> \Swagger\Client\Model\InlineResponse2011 createWebhook($api_version, $webhook)

Create webhooks to receive Message

To receive messages you will need to setup a webhook. A webhook is then attached to your phone number.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\WebhookApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$api_version = "1.0"; // string | API Version. If not specified your pinned verison is used.
$webhook = new \Swagger\Client\Model\CreateWebhook(); // \Swagger\Client\Model\CreateWebhook | Create Webhook object

try {
    $result = $apiInstance->createWebhook($api_version, $webhook);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookApi->createWebhook: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_version** | **string**| API Version. If not specified your pinned verison is used. | [optional] [default to 1.0]
 **webhook** | [**\Swagger\Client\Model\CreateWebhook**](../Model/CreateWebhook.md)| Create Webhook object | [optional]

### Return type

[**\Swagger\Client\Model\InlineResponse2011**](../Model/InlineResponse2011.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteWebhookById**
> deleteWebhookById($uid, $api_version)

Delete a webhook by ID

Delete a webhook by ID

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\WebhookApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$uid = "uid_example"; // string | Alphanumeric ID of the webhook to be deleted.
$api_version = "1.0"; // string | API Version. If not specified your pinned verison is used.

try {
    $apiInstance->deleteWebhookById($uid, $api_version);
} catch (Exception $e) {
    echo 'Exception when calling WebhookApi->deleteWebhookById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **uid** | **string**| Alphanumeric ID of the webhook to be deleted. |
 **api_version** | **string**| API Version. If not specified your pinned verison is used. | [optional] [default to 1.0]

### Return type

void (empty response body)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getWebhook**
> \Swagger\Client\Model\InlineResponse2003 getWebhook($api_version, $offset, $limit)

Get a list of your webhooks

Get a list of your webhooks

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\WebhookApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$api_version = "1.0"; // string | API Version. If not specified your pinned verison is used.
$offset = 0; // int | The number of items to skip before starting to collect the result set.
$limit = 10; // int | The numbers of items to return.

try {
    $result = $apiInstance->getWebhook($api_version, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookApi->getWebhook: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_version** | **string**| API Version. If not specified your pinned verison is used. | [optional] [default to 1.0]
 **offset** | **int**| The number of items to skip before starting to collect the result set. | [optional] [default to 0]
 **limit** | **int**| The numbers of items to return. | [optional] [default to 10]

### Return type

[**\Swagger\Client\Model\InlineResponse2003**](../Model/InlineResponse2003.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getWebhookById**
> \Swagger\Client\Model\InlineResponse2011 getWebhookById($uid, $api_version)

Get a webhook by ID

Get a webhook by ID

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\WebhookApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$uid = "uid_example"; // string | Alphanumeric ID of the webhook to get.
$api_version = "1.0"; // string | API Version. If not specified your pinned verison is used.

try {
    $result = $apiInstance->getWebhookById($uid, $api_version);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookApi->getWebhookById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **uid** | **string**| Alphanumeric ID of the webhook to get. |
 **api_version** | **string**| API Version. If not specified your pinned verison is used. | [optional] [default to 1.0]

### Return type

[**\Swagger\Client\Model\InlineResponse2011**](../Model/InlineResponse2011.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **patchWebhook**
> \Swagger\Client\Model\InlineResponse2011 patchWebhook($uid, $api_version, $webhook)

Edit a webhook

Edit a webhook

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\WebhookApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$uid = "uid_example"; // string | Alphanumeric ID of the webhook to edit.
$api_version = "1.0"; // string | API Version. If not specified your pinned verison is used.
$webhook = new \Swagger\Client\Model\EditWebhook(); // \Swagger\Client\Model\EditWebhook | Webhook object

try {
    $result = $apiInstance->patchWebhook($uid, $api_version, $webhook);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookApi->patchWebhook: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **uid** | **string**| Alphanumeric ID of the webhook to edit. |
 **api_version** | **string**| API Version. If not specified your pinned verison is used. | [optional] [default to 1.0]
 **webhook** | [**\Swagger\Client\Model\EditWebhook**](../Model/EditWebhook.md)| Webhook object | [optional]

### Return type

[**\Swagger\Client\Model\InlineResponse2011**](../Model/InlineResponse2011.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

