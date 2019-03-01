# Karix\NumberApi

All URIs are relative to *https://api.karix.io*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteNumber**](NumberApi.md#deleteNumber) | **DELETE** /number/{num}/ | Unrent number from your account
[**getNumber**](NumberApi.md#getNumber) | **GET** /number/ | Get details of all phone numbers linked to your account.
[**getNumberDetails**](NumberApi.md#getNumberDetails) | **GET** /number/{num}/ | Get details of a number
[**patchNumberDetails**](NumberApi.md#patchNumberDetails) | **PATCH** /number/{num}/ | Edit phone number belonging to your account
[**rentNumber**](NumberApi.md#rentNumber) | **POST** /number/ | Rent a phone number


# **deleteNumber**
> deleteNumber($num)

Unrent number from your account

Unrent number from your account

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Karix\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Karix\Api\NumberApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$num = 56; // int | Number which needs to be unrented

try {
    $apiInstance->deleteNumber($num);
} catch (Exception $e) {
    echo 'Exception when calling NumberApi->deleteNumber: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **num** | **int**| Number which needs to be unrented |

### Return type

void (empty response body)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getNumber**
> \Karix\Model\AccountNumberListResponse getNumber($offset, $limit, $country, $contains, $number_type)

Get details of all phone numbers linked to your account.

Get details of all phone numbers linked to your account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Karix\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Karix\Api\NumberApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$offset = 0; // int | The number of items to skip before starting to collect the result set.
$limit = 10; // int | The numbers of items to return.
$country = "country_example"; // string | Filter by country ISO
$contains = "contains_example"; // string | Filter by numbers which contain this value
$number_type = array("number_type_example"); // string[] | Filter by number type: fixed, mobile, tollfree

try {
    $result = $apiInstance->getNumber($offset, $limit, $country, $contains, $number_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NumberApi->getNumber: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **offset** | **int**| The number of items to skip before starting to collect the result set. | [optional] [default to 0]
 **limit** | **int**| The numbers of items to return. | [optional] [default to 10]
 **country** | **string**| Filter by country ISO | [optional]
 **contains** | **string**| Filter by numbers which contain this value | [optional]
 **number_type** | [**string[]**](../Model/string.md)| Filter by number type: fixed, mobile, tollfree | [optional]

### Return type

[**\Karix\Model\AccountNumberListResponse**](../Model/AccountNumberListResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getNumberDetails**
> \Karix\Model\AccountNumberResponse getNumberDetails($num)

Get details of a number

Get details of a number

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Karix\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Karix\Api\NumberApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$num = 56; // int | Number for which details need to be fetched

try {
    $result = $apiInstance->getNumberDetails($num);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NumberApi->getNumberDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **num** | **int**| Number for which details need to be fetched |

### Return type

[**\Karix\Model\AccountNumberResponse**](../Model/AccountNumberResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **patchNumberDetails**
> \Karix\Model\AccountNumberResponse patchNumberDetails($num, $number)

Edit phone number belonging to your account

Edit phone number belonging to your account

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Karix\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Karix\Api\NumberApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$num = 56; // int | Number which needs to be edited
$number = new \Karix\Model\EditAccountNumber(); // \Karix\Model\EditAccountNumber | Account Number object

try {
    $result = $apiInstance->patchNumberDetails($num, $number);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NumberApi->patchNumberDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **num** | **int**| Number which needs to be edited |
 **number** | [**\Karix\Model\EditAccountNumber**](../Model/EditAccountNumber.md)| Account Number object |

### Return type

[**\Karix\Model\AccountNumberResponse**](../Model/AccountNumberResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **rentNumber**
> \Karix\Model\NumberRentedResponse rentNumber($number)

Rent a phone number

Rent a phone number. Refer to Number Search API to find available phone numbers

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Karix\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Karix\Api\NumberApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$number = new \Karix\Model\RentNumber(); // \Karix\Model\RentNumber | Rent Details object

try {
    $result = $apiInstance->rentNumber($number);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NumberApi->rentNumber: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **number** | [**\Karix\Model\RentNumber**](../Model/RentNumber.md)| Rent Details object |

### Return type

[**\Karix\Model\NumberRentedResponse**](../Model/NumberRentedResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

