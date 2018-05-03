<?php
/**
 * MessageApi
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

namespace Swagger\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Swagger\Client\ApiException;
use Swagger\Client\Configuration;
use Swagger\Client\HeaderSelector;
use Swagger\Client\ObjectSerializer;

/**
 * MessageApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class MessageApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getMessage
     *
     * Get list of messages sent or received
     *
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     * @param  string $direction Message direction, inbound or outbound to filter on. If not provided, the filter is not applied. (optional)
     * @param  string $account_uid Filter the result list by the account which sent the message - If not provided or &#x60;null&#x60; or empty string, no filter will be placed   and all the messages by the main account and its subaccounts are returned - To get the list of messages sent by main account only, set &#x60;account_uid&#x60;   to main account&#39;s uid. (optional)
     * @param  string $state Filter the result on the basis of message state. (optional)
     * @param  int $offset The number of items to skip before starting to collect the result set. (optional, default to 0)
     * @param  int $limit The numbers of items to return. (optional, default to 10)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse2001
     */
    public function getMessage($api_version = '1.0', $direction = null, $account_uid = null, $state = null, $offset = '0', $limit = '10')
    {
        list($response) = $this->getMessageWithHttpInfo($api_version, $direction, $account_uid, $state, $offset, $limit);
        return $response;
    }

    /**
     * Operation getMessageWithHttpInfo
     *
     * Get list of messages sent or received
     *
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     * @param  string $direction Message direction, inbound or outbound to filter on. If not provided, the filter is not applied. (optional)
     * @param  string $account_uid Filter the result list by the account which sent the message - If not provided or &#x60;null&#x60; or empty string, no filter will be placed   and all the messages by the main account and its subaccounts are returned - To get the list of messages sent by main account only, set &#x60;account_uid&#x60;   to main account&#39;s uid. (optional)
     * @param  string $state Filter the result on the basis of message state. (optional)
     * @param  int $offset The number of items to skip before starting to collect the result set. (optional, default to 0)
     * @param  int $limit The numbers of items to return. (optional, default to 10)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse2001, HTTP status code, HTTP response headers (array of strings)
     */
    public function getMessageWithHttpInfo($api_version = '1.0', $direction = null, $account_uid = null, $state = null, $offset = '0', $limit = '10')
    {
        $returnType = '\Swagger\Client\Model\InlineResponse2001';
        $request = $this->getMessageRequest($api_version, $direction, $account_uid, $state, $offset, $limit);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse2001',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse500',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getMessageAsync
     *
     * Get list of messages sent or received
     *
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     * @param  string $direction Message direction, inbound or outbound to filter on. If not provided, the filter is not applied. (optional)
     * @param  string $account_uid Filter the result list by the account which sent the message - If not provided or &#x60;null&#x60; or empty string, no filter will be placed   and all the messages by the main account and its subaccounts are returned - To get the list of messages sent by main account only, set &#x60;account_uid&#x60;   to main account&#39;s uid. (optional)
     * @param  string $state Filter the result on the basis of message state. (optional)
     * @param  int $offset The number of items to skip before starting to collect the result set. (optional, default to 0)
     * @param  int $limit The numbers of items to return. (optional, default to 10)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMessageAsync($api_version = '1.0', $direction = null, $account_uid = null, $state = null, $offset = '0', $limit = '10')
    {
        return $this->getMessageAsyncWithHttpInfo($api_version, $direction, $account_uid, $state, $offset, $limit)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getMessageAsyncWithHttpInfo
     *
     * Get list of messages sent or received
     *
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     * @param  string $direction Message direction, inbound or outbound to filter on. If not provided, the filter is not applied. (optional)
     * @param  string $account_uid Filter the result list by the account which sent the message - If not provided or &#x60;null&#x60; or empty string, no filter will be placed   and all the messages by the main account and its subaccounts are returned - To get the list of messages sent by main account only, set &#x60;account_uid&#x60;   to main account&#39;s uid. (optional)
     * @param  string $state Filter the result on the basis of message state. (optional)
     * @param  int $offset The number of items to skip before starting to collect the result set. (optional, default to 0)
     * @param  int $limit The numbers of items to return. (optional, default to 10)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMessageAsyncWithHttpInfo($api_version = '1.0', $direction = null, $account_uid = null, $state = null, $offset = '0', $limit = '10')
    {
        $returnType = '\Swagger\Client\Model\InlineResponse2001';
        $request = $this->getMessageRequest($api_version, $direction, $account_uid, $state, $offset, $limit);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getMessage'
     *
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     * @param  string $direction Message direction, inbound or outbound to filter on. If not provided, the filter is not applied. (optional)
     * @param  string $account_uid Filter the result list by the account which sent the message - If not provided or &#x60;null&#x60; or empty string, no filter will be placed   and all the messages by the main account and its subaccounts are returned - To get the list of messages sent by main account only, set &#x60;account_uid&#x60;   to main account&#39;s uid. (optional)
     * @param  string $state Filter the result on the basis of message state. (optional)
     * @param  int $offset The number of items to skip before starting to collect the result set. (optional, default to 0)
     * @param  int $limit The numbers of items to return. (optional, default to 10)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getMessageRequest($api_version = '1.0', $direction = null, $account_uid = null, $state = null, $offset = '0', $limit = '10')
    {

        $resourcePath = '/message/';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($direction !== null) {
            $queryParams['direction'] = ObjectSerializer::toQueryValue($direction);
        }
        // query params
        if ($account_uid !== null) {
            $queryParams['account_uid'] = ObjectSerializer::toQueryValue($account_uid);
        }
        // query params
        if ($state !== null) {
            $queryParams['state'] = ObjectSerializer::toQueryValue($state);
        }
        // query params
        if ($offset !== null) {
            $queryParams['offset'] = ObjectSerializer::toQueryValue($offset);
        }
        // query params
        if ($limit !== null) {
            $queryParams['limit'] = ObjectSerializer::toQueryValue($limit);
        }
        // header params
        if ($api_version !== null) {
            $headerParams['api-version'] = ObjectSerializer::toHeaderValue($api_version);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getMessageById
     *
     * Get message details by id.
     *
     * @param  string $uid Alphanumeric ID of the message to get. (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse2002
     */
    public function getMessageById($uid, $api_version = '1.0')
    {
        list($response) = $this->getMessageByIdWithHttpInfo($uid, $api_version);
        return $response;
    }

    /**
     * Operation getMessageByIdWithHttpInfo
     *
     * Get message details by id.
     *
     * @param  string $uid Alphanumeric ID of the message to get. (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse2002, HTTP status code, HTTP response headers (array of strings)
     */
    public function getMessageByIdWithHttpInfo($uid, $api_version = '1.0')
    {
        $returnType = '\Swagger\Client\Model\InlineResponse2002';
        $request = $this->getMessageByIdRequest($uid, $api_version);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse2002',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse500',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getMessageByIdAsync
     *
     * Get message details by id.
     *
     * @param  string $uid Alphanumeric ID of the message to get. (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMessageByIdAsync($uid, $api_version = '1.0')
    {
        return $this->getMessageByIdAsyncWithHttpInfo($uid, $api_version)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getMessageByIdAsyncWithHttpInfo
     *
     * Get message details by id.
     *
     * @param  string $uid Alphanumeric ID of the message to get. (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMessageByIdAsyncWithHttpInfo($uid, $api_version = '1.0')
    {
        $returnType = '\Swagger\Client\Model\InlineResponse2002';
        $request = $this->getMessageByIdRequest($uid, $api_version);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getMessageById'
     *
     * @param  string $uid Alphanumeric ID of the message to get. (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getMessageByIdRequest($uid, $api_version = '1.0')
    {
        // verify the required parameter 'uid' is set
        if ($uid === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $uid when calling getMessageById'
            );
        }

        $resourcePath = '/message/{uid}/';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($api_version !== null) {
            $headerParams['api-version'] = ObjectSerializer::toHeaderValue($api_version);
        }

        // path params
        if ($uid !== null) {
            $resourcePath = str_replace(
                '{' . 'uid' . '}',
                ObjectSerializer::toPathValue($uid),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation sendMessage
     *
     * Send a message to a list of phone numbers
     *
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     * @param  \Swagger\Client\Model\CreateMessage $message Create Message object (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse202
     */
    public function sendMessage($api_version = '1.0', $message = null)
    {
        list($response) = $this->sendMessageWithHttpInfo($api_version, $message);
        return $response;
    }

    /**
     * Operation sendMessageWithHttpInfo
     *
     * Send a message to a list of phone numbers
     *
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     * @param  \Swagger\Client\Model\CreateMessage $message Create Message object (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse202, HTTP status code, HTTP response headers (array of strings)
     */
    public function sendMessageWithHttpInfo($api_version = '1.0', $message = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse202';
        $request = $this->sendMessageRequest($api_version, $message);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 202:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse202',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse500',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse402',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse500',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation sendMessageAsync
     *
     * Send a message to a list of phone numbers
     *
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     * @param  \Swagger\Client\Model\CreateMessage $message Create Message object (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendMessageAsync($api_version = '1.0', $message = null)
    {
        return $this->sendMessageAsyncWithHttpInfo($api_version, $message)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation sendMessageAsyncWithHttpInfo
     *
     * Send a message to a list of phone numbers
     *
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     * @param  \Swagger\Client\Model\CreateMessage $message Create Message object (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendMessageAsyncWithHttpInfo($api_version = '1.0', $message = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse202';
        $request = $this->sendMessageRequest($api_version, $message);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'sendMessage'
     *
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     * @param  \Swagger\Client\Model\CreateMessage $message Create Message object (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function sendMessageRequest($api_version = '1.0', $message = null)
    {

        $resourcePath = '/message/';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($api_version !== null) {
            $headerParams['api-version'] = ObjectSerializer::toHeaderValue($api_version);
        }


        // body params
        $_tempBody = null;
        if (isset($message)) {
            $_tempBody = $message;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
