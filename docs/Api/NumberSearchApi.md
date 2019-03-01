# Karix\NumberSearchApi

All URIs are relative to *https://api.karix.io*

Method | HTTP request | Description
------------- | ------------- | -------------
[**searchNumber**](NumberSearchApi.md#searchNumber) | **GET** /numbersearch/ | Query for phone numbers in our inventory.


# **searchNumber**
> \Karix\Model\PhoneNumberListResponse searchNumber($offset, $limit, $country, $prefix, $contains, $number_type)

Query for phone numbers in our inventory.

Query for phone numbers in our inventory

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Karix\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Karix\Api\NumberSearchApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$offset = 0; // int | The number of items to skip before starting to collect the result set.
$limit = 10; // int | The numbers of items to return.
$country = "US"; // string | Filter by country ISO. Only one country can be filtered at a time. If no country filter is provided then results for United States are returned by default.
$prefix = "prefix_example"; // string | Filter by numbers with this prefix after country code
$contains = "contains_example"; // string | Filter by numbers which contain this value
$number_type = array("number_type_example"); // string[] | Filter by number type: fixed, mobile, tollfree

try {
    $result = $apiInstance->searchNumber($offset, $limit, $country, $prefix, $contains, $number_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NumberSearchApi->searchNumber: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **offset** | **int**| The number of items to skip before starting to collect the result set. | [optional] [default to 0]
 **limit** | **int**| The numbers of items to return. | [optional] [default to 10]
 **country** | **string**| Filter by country ISO. Only one country can be filtered at a time. If no country filter is provided then results for United States are returned by default. | [optional] [default to US]
 **prefix** | **string**| Filter by numbers with this prefix after country code | [optional]
 **contains** | **string**| Filter by numbers which contain this value | [optional]
 **number_type** | [**string[]**](../Model/string.md)| Filter by number type: fixed, mobile, tollfree | [optional]

### Return type

[**\Karix\Model\PhoneNumberListResponse**](../Model/PhoneNumberListResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

