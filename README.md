# karix-php
## Overview 

Karix API lets you interact with the Karix platform. It allows you to query
your account, set up webhooks, send messages and buy phone numbers.  


## API and Clients Versioning

Karix APIs are versioned using the format vX.Y where X is the major version number and Y is minor. 
All minor version changes are backwards compatible but major releases are not. 
Please be careful when upgrading.  A new user account is pinned to the latest version at 
the time of first request. By default every request sent Karix is processed using that version, 
even if there have been subsequent breaking changes. This is done to prevent 
existing user applications from breaking. You can change the pinned version for your 
account using the account dashboard. The default API version can be overridden by 
specifying the header `api-version`. Note: Specifying this value will not change your
pinned version for other calls.  Karix also provides HTTP API clients for all major languages. 
Release versions of these clients correspond to their API Version supported. Client version vX.Y.Z 
supports API version vX.Y. HTTP Clients are configured to use `api-version` header for 
that client version. When using official Karix HTTP Clients only, you dont need to concern yourself with 
pinned version. To upgrade your API version simply update the client.  

## Common Request Structures 

All Karix APIs follow a common REST format with the following resources:   

- account   
- message   
- webhook   
- number 

## Creating a resource 

To create a request send a `POST` request with the desired parameters in a JSON object 
to `/<resource>/` url. A successful response will contain the details of the single 
resource created with HTTP status code `201 Created`. Note: An exception to this is 
the `Create Message` API which is a bulk API and returns a list of message records.  

## Fetching a resource

To fetch a resource by its Unique ID send a `GET` request to `/<resource>/<uid>/` 
where `uid` is the Alphanumeric Unique ID of the resource. A successful response will contain 
the details of the single resource fetched with HTTP status code `200 OK` 

## Editing a resource

To edit certain parameters of a resource send a `PATCH` request to `/<resource>/<uid>/` 
where `uid` is the Alphanumeric Unique ID of the resource, with a JSON object containing only 
the parameters which need to be updated. Edit resource APIs generally have no required parameters. 
A successful response will contain all the details of the single resource after editing.  

## Deleting a resource

To delete a resource send a `DELETE` request to `/<resource>/<uid>/` where `uid` is 
the Alphanumeric Unique ID of the resource. A successful response will return HTTP status 
code `204 No Content` with no body.

## Fetching a list of resources

To fetch a list of resources send a `GET` request to `/<resource>/` with filters as 
GET parameters. A successful response will contain a list of filtered paginated objects 
with HTTP status code `200 OK`. 

## Pagination

Pagination for list APIs are controlled using GET parameters:   

- `limit`: Number of objects to be returned   
- `offset`: Number of objects to skip before collecting the output list.

## Common Response Structures

All Karix APIs follow some common respose structures. 

### Success Responses  

### Single Resource Response

Responses returning a single object will have the following keys 

| Key           | Child Key     | Description                               | 
|:------------- |:------------- |:----------------------------------------- |
| meta          |               | Meta Details about request and response   |
|               | request_uuid  | Unique request identifier                 |
| data          |               | Details of the object                     |

### List Resource Response

Responses returning a list of objects will have the following keys 

| Key           | Child Key     | Description                               |
|:------------- |:------------- |:----------------------------------------- |
| meta          |               | Meta Details about request and response   |
|               | request_uuid  | Unique request identifier                 |
|               | previous      | Link to the previous page of the list     |
|               | next          | Link to the next page of the list         |
|               | count         | Total number of objects over all pages    |
|               | limit         | Limit the API was requested with          |
|               | offset        | Page Offset the API was requested with    |
| objects       |               | List of objects with details              | 

## Error Responses  

### Validation Error Response  

Responses for requests which failed due to validation errors will have the follwing keys:

| Key           | Child Key     | Description                                |
|:------------- |:------------- |:------------------------------------------ |
| meta          |               | Meta Details about request and response    |
|               | request_uuid  | Unique request identifier                  |
| error         |               | Details for the error                      |
|               | message       | Error message                              |
|               | param         | (Optional) parameter this error relates to |  

Validation error responses will return HTTP Status Code `400 Bad Request`  


### Insufficient Balance Response  

Some requests will require to consume account credits. In case of insufficient balance the following keys will be returned: 

| Key           | Child Key     | Description                               |
|:------------- |:------------- |:----------------------------------------- |
| meta          |               | Meta Details about request and response   |
|               | request_uuid  | Unique request identifier                 |
| error         |               | Details for the error                     |
|               | message       | `Insufficient Balance`                    | 

Insufficient balance response will return HTTP Status Code `402 Payment Required`

This PHP package is automatically generated by the [Swagger Codegen](https://github.com/swagger-api/swagger-codegen) project:

- API version: 1.0
- Build package: io.swagger.codegen.languages.PhpClientCodegen

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/karixtech/karix-php.git"
    }
  ],
  "require": {
    "karixtech/karix-php": "*@master"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/SwaggerClient-php/vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicAuth
    ->setUsername('YOUR_USERNAME')
    ->setPassword('YOUR_PASSWORD');

$apiInstance = new Swagger\Client\Api\AccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$api_version = "1.0"; // string | API Version. If not specified your pinned verison is used.
$subaccount = new \Swagger\Client\Model\CreateAccount(); // \Swagger\Client\Model\CreateAccount | Subaccount object

try {
    $result = $apiInstance->createSubaccount($api_version, $subaccount);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountsApi->createSubaccount: ', $e->getMessage(), PHP_EOL;
}

?>
```

## Documentation for API Endpoints

All URIs are relative to *https://api.karix.io*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AccountsApi* | [**createSubaccount**](docs/Api/AccountsApi.md#createsubaccount) | **POST** /account/ | Create a new subaccount
*AccountsApi* | [**getSubaccount**](docs/Api/AccountsApi.md#getsubaccount) | **GET** /account/ | Get a list of accounts
*AccountsApi* | [**getSubaccountById**](docs/Api/AccountsApi.md#getsubaccountbyid) | **GET** /account/{uid}/ | Get details of an account
*AccountsApi* | [**patchSubaccount**](docs/Api/AccountsApi.md#patchsubaccount) | **PATCH** /account/{uid}/ | Edit an account
*MessageApi* | [**getMessage**](docs/Api/MessageApi.md#getmessage) | **GET** /message/ | Get list of messages sent or received
*MessageApi* | [**getMessageById**](docs/Api/MessageApi.md#getmessagebyid) | **GET** /message/{uid}/ | Get message details by id.
*MessageApi* | [**sendMessage**](docs/Api/MessageApi.md#sendmessage) | **POST** /message/ | Send a message to a list of phone numbers
*NumberApi* | [**getNumber**](docs/Api/NumberApi.md#getnumber) | **GET** /number/ | Get details of all phone numbers linked to your account.
*NumberApi* | [**numberNumDelete**](docs/Api/NumberApi.md#numbernumdelete) | **DELETE** /number/{num}/ | Unrent number from your account
*NumberApi* | [**numberNumGet**](docs/Api/NumberApi.md#numbernumget) | **GET** /number/{num}/ | Get details of a number
*NumberApi* | [**numberNumPatch**](docs/Api/NumberApi.md#numbernumpatch) | **PATCH** /number/{num}/ | Edit phone number belonging to your account
*NumberApi* | [**rentNumber**](docs/Api/NumberApi.md#rentnumber) | **POST** /number/ | Rent a phone number
*NumberSearchApi* | [**numbersearchGet**](docs/Api/NumberSearchApi.md#numbersearchget) | **GET** /numbersearch/ | Query for phone numbers in our inventory.
*WebhookApi* | [**createWebhook**](docs/Api/WebhookApi.md#createwebhook) | **POST** /webhook/ | Create webhooks to receive Message
*WebhookApi* | [**deleteWebhookById**](docs/Api/WebhookApi.md#deletewebhookbyid) | **DELETE** /webhook/{uid}/ | Delete a webhook by ID
*WebhookApi* | [**getWebhook**](docs/Api/WebhookApi.md#getwebhook) | **GET** /webhook/ | Get a list of your webhooks
*WebhookApi* | [**getWebhookById**](docs/Api/WebhookApi.md#getwebhookbyid) | **GET** /webhook/{uid}/ | Get a webhook by ID
*WebhookApi* | [**patchWebhook**](docs/Api/WebhookApi.md#patchwebhook) | **PATCH** /webhook/{uid}/ | Edit a webhook


## Documentation For Models

 - [CreateAccount](docs/Model/CreateAccount.md)
 - [CreateMessage](docs/Model/CreateMessage.md)
 - [CreateWebhook](docs/Model/CreateWebhook.md)
 - [EditAccount](docs/Model/EditAccount.md)
 - [EditAccountNumber](docs/Model/EditAccountNumber.md)
 - [EditWebhook](docs/Model/EditWebhook.md)
 - [InlineResponse200](docs/Model/InlineResponse200.md)
 - [InlineResponse2001](docs/Model/InlineResponse2001.md)
 - [InlineResponse2002](docs/Model/InlineResponse2002.md)
 - [InlineResponse2003](docs/Model/InlineResponse2003.md)
 - [InlineResponse2004](docs/Model/InlineResponse2004.md)
 - [InlineResponse2005](docs/Model/InlineResponse2005.md)
 - [InlineResponse2006](docs/Model/InlineResponse2006.md)
 - [InlineResponse201](docs/Model/InlineResponse201.md)
 - [InlineResponse2011](docs/Model/InlineResponse2011.md)
 - [InlineResponse2012](docs/Model/InlineResponse2012.md)
 - [InlineResponse202](docs/Model/InlineResponse202.md)
 - [InlineResponse402](docs/Model/InlineResponse402.md)
 - [InlineResponse402Error](docs/Model/InlineResponse402Error.md)
 - [InlineResponse403](docs/Model/InlineResponse403.md)
 - [InlineResponse403Error](docs/Model/InlineResponse403Error.md)
 - [InlineResponse404](docs/Model/InlineResponse404.md)
 - [InlineResponse404Error](docs/Model/InlineResponse404Error.md)
 - [InlineResponse500](docs/Model/InlineResponse500.md)
 - [InlineResponse500Error](docs/Model/InlineResponse500Error.md)
 - [Message](docs/Model/Message.md)
 - [MessageError](docs/Model/MessageError.md)
 - [MetaResponse](docs/Model/MetaResponse.md)
 - [PhoneNumber](docs/Model/PhoneNumber.md)
 - [PhoneNumberRate](docs/Model/PhoneNumberRate.md)
 - [PhoneNumberRegion](docs/Model/PhoneNumberRegion.md)
 - [PhoneNumberService](docs/Model/PhoneNumberService.md)
 - [RentNumber](docs/Model/RentNumber.md)
 - [Account](docs/Model/Account.md)
 - [AccountNumber](docs/Model/AccountNumber.md)
 - [ArrayMetaResponse](docs/Model/ArrayMetaResponse.md)
 - [MetaResponseWithBalance](docs/Model/MetaResponseWithBalance.md)
 - [ObjectMetaResponse](docs/Model/ObjectMetaResponse.md)
 - [Webhook](docs/Model/Webhook.md)


## Documentation For Authorization


## basicAuth

- **Type**: HTTP basic authentication


## Author

support@karix.io


