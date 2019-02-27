# Karix\AccountsApi

All URIs are relative to *https://api.karix.io*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createSubaccount**](AccountsApi.md#createSubaccount) | **POST** /account/ | Create a new subaccount
[**getSubaccount**](AccountsApi.md#getSubaccount) | **GET** /account/ | Get a list of accounts
[**getSubaccountById**](AccountsApi.md#getSubaccountById) | **GET** /account/{uid}/ | Get details of an account
[**patchSubaccount**](AccountsApi.md#patchSubaccount) | **PATCH** /account/{uid}/ | Edit an account


# **createSubaccount**
> \Karix\Model\AccountResponse createSubaccount($subaccount)

Create a new subaccount

Create a new subaccount under your account

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Karix\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Karix\Api\AccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$subaccount = new \Karix\Model\CreateAccount(); // \Karix\Model\CreateAccount | Subaccount object

try {
    $result = $apiInstance->createSubaccount($subaccount);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountsApi->createSubaccount: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **subaccount** | [**\Karix\Model\CreateAccount**](../Model/CreateAccount.md)| Subaccount object |

### Return type

[**\Karix\Model\AccountResponse**](../Model/AccountResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSubaccount**
> \Karix\Model\AccountListResponse getSubaccount($offset, $limit)

Get a list of accounts

Get a list of details of all subaccounts, including the main account. Accounts are sorted by last updated time.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Karix\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Karix\Api\AccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$offset = 0; // int | The number of items to skip before starting to collect the result set.
$limit = 10; // int | The numbers of items to return.

try {
    $result = $apiInstance->getSubaccount($offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountsApi->getSubaccount: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **offset** | **int**| The number of items to skip before starting to collect the result set. | [optional] [default to 0]
 **limit** | **int**| The numbers of items to return. | [optional] [default to 10]

### Return type

[**\Karix\Model\AccountListResponse**](../Model/AccountListResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSubaccountById**
> \Karix\Model\AccountResponse getSubaccountById($uid)

Get details of an account

Get details of an account by its uid. Both main account and subaccounts can be fetched using their uids.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Karix\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Karix\Api\AccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$uid = "uid_example"; // string | Alphanumeric ID of the subaccount to get.

try {
    $result = $apiInstance->getSubaccountById($uid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountsApi->getSubaccountById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **uid** | **string**| Alphanumeric ID of the subaccount to get. |

### Return type

[**\Karix\Model\AccountResponse**](../Model/AccountResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **patchSubaccount**
> \Karix\Model\AccountResponse patchSubaccount($uid, $subaccount)

Edit an account

Edit details of your account or its subaccount   - An account can only change the status of subaccounts under it.     It cant change its own status   - A parent account can edit its own details and the details of its subaccounts

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
$config = Karix\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Karix\Api\AccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$uid = "uid_example"; // string | Alphanumeric ID of the account/subaccount to edit.
$subaccount = new \Karix\Model\EditAccount(); // \Karix\Model\EditAccount | Subaccount object

try {
    $result = $apiInstance->patchSubaccount($uid, $subaccount);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountsApi->patchSubaccount: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **uid** | **string**| Alphanumeric ID of the account/subaccount to edit. |
 **subaccount** | [**\Karix\Model\EditAccount**](../Model/EditAccount.md)| Subaccount object |

### Return type

[**\Karix\Model\AccountResponse**](../Model/AccountResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

