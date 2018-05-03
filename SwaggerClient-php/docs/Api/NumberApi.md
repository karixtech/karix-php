# Swagger\Client\NumberApi

All URIs are relative to *https://api.karix.io*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getNumber**](NumberApi.md#getNumber) | **GET** /number/ | Get details of all phone numbers linked to your account.
[**numberNumDelete**](NumberApi.md#numberNumDelete) | **DELETE** /number/{num}/ | Unrent number from your account
[**numberNumGet**](NumberApi.md#numberNumGet) | **GET** /number/{num}/ | Get details of a number
[**numberNumPatch**](NumberApi.md#numberNumPatch) | **PATCH** /number/{num}/ | Edit phone number belonging to your account
[**rentNumber**](NumberApi.md#rentNumber) | **POST** /number/ | Rent a phone number


# **getNumber**
> \Swagger\Client\Model\InlineResponse2004 getNumber($api_version, $offset, $limit, $country, $contains, $number_type)

Get details of all phone numbers linked to your account.

Get details of all phone numbers linked to your account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\NumberApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$api_version = "1.0"; // string | API Version. If not specified your pinned verison is used.
$offset = 0; // int | The number of items to skip before starting to collect the result set.
$limit = 10; // int | The numbers of items to return.
$country = "country_example"; // string | Filter by country ISO
$contains = "contains_example"; // string | Filter by numbers which contain this value
$number_type = array("number_type_example"); // string[] | Filter by number type: fixed, mobile, tollfree

try {
    $result = $apiInstance->getNumber($api_version, $offset, $limit, $country, $contains, $number_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NumberApi->getNumber: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_version** | **string**| API Version. If not specified your pinned verison is used. | [optional] [default to 1.0]
 **offset** | **int**| The number of items to skip before starting to collect the result set. | [optional] [default to 0]
 **limit** | **int**| The numbers of items to return. | [optional] [default to 10]
 **country** | **string**| Filter by country ISO | [optional]
 **contains** | **string**| Filter by numbers which contain this value | [optional]
 **number_type** | [**string[]**](../Model/string.md)| Filter by number type: fixed, mobile, tollfree | [optional]

### Return type

[**\Swagger\Client\Model\InlineResponse2004**](../Model/InlineResponse2004.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **numberNumDelete**
> numberNumDelete($num, $api_version)

Unrent number from your account

Unrent number from your account

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\NumberApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$num = 56; // int | Number which needs to be unrented
$api_version = "1.0"; // string | API Version. If not specified your pinned verison is used.

try {
    $apiInstance->numberNumDelete($num, $api_version);
} catch (Exception $e) {
    echo 'Exception when calling NumberApi->numberNumDelete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **num** | **int**| Number which needs to be unrented |
 **api_version** | **string**| API Version. If not specified your pinned verison is used. | [optional] [default to 1.0]

### Return type

void (empty response body)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **numberNumGet**
> \Swagger\Client\Model\InlineResponse2005 numberNumGet($num, $api_version)

Get details of a number

Get details of a number

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\NumberApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$num = 56; // int | Number for which details need to be fetched
$api_version = "1.0"; // string | API Version. If not specified your pinned verison is used.

try {
    $result = $apiInstance->numberNumGet($num, $api_version);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NumberApi->numberNumGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **num** | **int**| Number for which details need to be fetched |
 **api_version** | **string**| API Version. If not specified your pinned verison is used. | [optional] [default to 1.0]

### Return type

[**\Swagger\Client\Model\InlineResponse2005**](../Model/InlineResponse2005.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **numberNumPatch**
> \Swagger\Client\Model\InlineResponse2005 numberNumPatch($num, $api_version, $number)

Edit phone number belonging to your account

Edit phone number belonging to your account

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\NumberApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$num = 56; // int | Number which needs to be edited
$api_version = "1.0"; // string | API Version. If not specified your pinned verison is used.
$number = new \Swagger\Client\Model\EditAccountNumber(); // \Swagger\Client\Model\EditAccountNumber | Account Number object

try {
    $result = $apiInstance->numberNumPatch($num, $api_version, $number);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NumberApi->numberNumPatch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **num** | **int**| Number which needs to be edited |
 **api_version** | **string**| API Version. If not specified your pinned verison is used. | [optional] [default to 1.0]
 **number** | [**\Swagger\Client\Model\EditAccountNumber**](../Model/EditAccountNumber.md)| Account Number object | [optional]

### Return type

[**\Swagger\Client\Model\InlineResponse2005**](../Model/InlineResponse2005.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **rentNumber**
> \Swagger\Client\Model\InlineResponse2012 rentNumber($number, $api_version)

Rent a phone number

Rent a phone number. Refer to Number Search API to find available phone numbers

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\NumberApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$number = new \Swagger\Client\Model\RentNumber(); // \Swagger\Client\Model\RentNumber | Rent Details object
$api_version = "1.0"; // string | API Version. If not specified your pinned verison is used.

try {
    $result = $apiInstance->rentNumber($number, $api_version);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NumberApi->rentNumber: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **number** | [**\Swagger\Client\Model\RentNumber**](../Model/RentNumber.md)| Rent Details object |
 **api_version** | **string**| API Version. If not specified your pinned verison is used. | [optional] [default to 1.0]

### Return type

[**\Swagger\Client\Model\InlineResponse2012**](../Model/InlineResponse2012.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

