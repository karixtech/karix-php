# Karix\WebhookApi

All URIs are relative to *https://api.karix.io*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createWebhook**](WebhookApi.md#createWebhook) | **POST** /webhook/ | Create webhooks to receive Message
[**deleteWebhookById**](WebhookApi.md#deleteWebhookById) | **DELETE** /webhook/{uid}/ | Delete a webhook by ID
[**getWebhook**](WebhookApi.md#getWebhook) | **GET** /webhook/ | Get a list of your webhooks
[**getWebhookById**](WebhookApi.md#getWebhookById) | **GET** /webhook/{uid}/ | Get a webhook by ID
[**patchWebhook**](WebhookApi.md#patchWebhook) | **PATCH** /webhook/{uid}/ | Edit a webhook


# **createWebhook**
> \Karix\Model\WebhookResponse createWebhook($webhook)

Create webhooks to receive Message

To receive messages you will need to setup a webhook. A webhook is then attached to your phone number.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Karix\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Karix\Api\WebhookApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook = new \Karix\Model\CreateWebhook(); // \Karix\Model\CreateWebhook | Create Webhook object

try {
    $result = $apiInstance->createWebhook($webhook);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookApi->createWebhook: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **webhook** | [**\Karix\Model\CreateWebhook**](../Model/CreateWebhook.md)| Create Webhook object |

### Return type

[**\Karix\Model\WebhookResponse**](../Model/WebhookResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteWebhookById**
> deleteWebhookById($uid)

Delete a webhook by ID

Delete a webhook by ID

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Karix\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Karix\Api\WebhookApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$uid = "uid_example"; // string | Alphanumeric ID of the webhook to be deleted.

try {
    $apiInstance->deleteWebhookById($uid);
} catch (Exception $e) {
    echo 'Exception when calling WebhookApi->deleteWebhookById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **uid** | **string**| Alphanumeric ID of the webhook to be deleted. |

### Return type

void (empty response body)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getWebhook**
> \Karix\Model\WebhookListResponse getWebhook($offset, $limit)

Get a list of your webhooks

Get a list of your webhooks

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Karix\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Karix\Api\WebhookApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$offset = 0; // int | The number of items to skip before starting to collect the result set.
$limit = 10; // int | The numbers of items to return.

try {
    $result = $apiInstance->getWebhook($offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookApi->getWebhook: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **offset** | **int**| The number of items to skip before starting to collect the result set. | [optional] [default to 0]
 **limit** | **int**| The numbers of items to return. | [optional] [default to 10]

### Return type

[**\Karix\Model\WebhookListResponse**](../Model/WebhookListResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getWebhookById**
> \Karix\Model\WebhookResponse getWebhookById($uid)

Get a webhook by ID

Get a webhook by ID

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Karix\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Karix\Api\WebhookApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$uid = "uid_example"; // string | Alphanumeric ID of the webhook to get.

try {
    $result = $apiInstance->getWebhookById($uid);
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

### Return type

[**\Karix\Model\WebhookResponse**](../Model/WebhookResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **patchWebhook**
> \Karix\Model\WebhookResponse patchWebhook($uid, $webhook)

Edit a webhook

Edit a webhook

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Karix\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Karix\Api\WebhookApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$uid = "uid_example"; // string | Alphanumeric ID of the webhook to edit.
$webhook = new \Karix\Model\EditWebhook(); // \Karix\Model\EditWebhook | Webhook object

try {
    $result = $apiInstance->patchWebhook($uid, $webhook);
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
 **webhook** | [**\Karix\Model\EditWebhook**](../Model/EditWebhook.md)| Webhook object |

### Return type

[**\Karix\Model\WebhookResponse**](../Model/WebhookResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

