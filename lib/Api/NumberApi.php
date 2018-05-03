<?php
/**
 * NumberApi
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
 * NumberApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class NumberApi
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
     * Operation getNumber
     *
     * Get details of all phone numbers linked to your account.
     *
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     * @param  int $offset The number of items to skip before starting to collect the result set. (optional, default to 0)
     * @param  int $limit The numbers of items to return. (optional, default to 10)
     * @param  string $country Filter by country ISO (optional)
     * @param  string $contains Filter by numbers which contain this value (optional)
     * @param  string[] $number_type Filter by number type: fixed, mobile, tollfree (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse2004
     */
    public function getNumber($api_version = '1.0', $offset = '0', $limit = '10', $country = null, $contains = null, $number_type = null)
    {
        list($response) = $this->getNumberWithHttpInfo($api_version, $offset, $limit, $country, $contains, $number_type);
        return $response;
    }

    /**
     * Operation getNumberWithHttpInfo
     *
     * Get details of all phone numbers linked to your account.
     *
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     * @param  int $offset The number of items to skip before starting to collect the result set. (optional, default to 0)
     * @param  int $limit The numbers of items to return. (optional, default to 10)
     * @param  string $country Filter by country ISO (optional)
     * @param  string $contains Filter by numbers which contain this value (optional)
     * @param  string[] $number_type Filter by number type: fixed, mobile, tollfree (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse2004, HTTP status code, HTTP response headers (array of strings)
     */
    public function getNumberWithHttpInfo($api_version = '1.0', $offset = '0', $limit = '10', $country = null, $contains = null, $number_type = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse2004';
        $request = $this->getNumberRequest($api_version, $offset, $limit, $country, $contains, $number_type);

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
                        '\Swagger\Client\Model\InlineResponse2004',
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
     * Operation getNumberAsync
     *
     * Get details of all phone numbers linked to your account.
     *
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     * @param  int $offset The number of items to skip before starting to collect the result set. (optional, default to 0)
     * @param  int $limit The numbers of items to return. (optional, default to 10)
     * @param  string $country Filter by country ISO (optional)
     * @param  string $contains Filter by numbers which contain this value (optional)
     * @param  string[] $number_type Filter by number type: fixed, mobile, tollfree (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getNumberAsync($api_version = '1.0', $offset = '0', $limit = '10', $country = null, $contains = null, $number_type = null)
    {
        return $this->getNumberAsyncWithHttpInfo($api_version, $offset, $limit, $country, $contains, $number_type)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getNumberAsyncWithHttpInfo
     *
     * Get details of all phone numbers linked to your account.
     *
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     * @param  int $offset The number of items to skip before starting to collect the result set. (optional, default to 0)
     * @param  int $limit The numbers of items to return. (optional, default to 10)
     * @param  string $country Filter by country ISO (optional)
     * @param  string $contains Filter by numbers which contain this value (optional)
     * @param  string[] $number_type Filter by number type: fixed, mobile, tollfree (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getNumberAsyncWithHttpInfo($api_version = '1.0', $offset = '0', $limit = '10', $country = null, $contains = null, $number_type = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse2004';
        $request = $this->getNumberRequest($api_version, $offset, $limit, $country, $contains, $number_type);

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
     * Create request for operation 'getNumber'
     *
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     * @param  int $offset The number of items to skip before starting to collect the result set. (optional, default to 0)
     * @param  int $limit The numbers of items to return. (optional, default to 10)
     * @param  string $country Filter by country ISO (optional)
     * @param  string $contains Filter by numbers which contain this value (optional)
     * @param  string[] $number_type Filter by number type: fixed, mobile, tollfree (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getNumberRequest($api_version = '1.0', $offset = '0', $limit = '10', $country = null, $contains = null, $number_type = null)
    {

        $resourcePath = '/number/';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($offset !== null) {
            $queryParams['offset'] = ObjectSerializer::toQueryValue($offset);
        }
        // query params
        if ($limit !== null) {
            $queryParams['limit'] = ObjectSerializer::toQueryValue($limit);
        }
        // query params
        if ($country !== null) {
            $queryParams['country'] = ObjectSerializer::toQueryValue($country);
        }
        // query params
        if ($contains !== null) {
            $queryParams['contains'] = ObjectSerializer::toQueryValue($contains);
        }
        // query params
        if (is_array($number_type)) {
            $number_type = ObjectSerializer::serializeCollection($number_type, 'csv', true);
        }
        if ($number_type !== null) {
            $queryParams['number_type'] = ObjectSerializer::toQueryValue($number_type);
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
     * Operation numberNumDelete
     *
     * Unrent number from your account
     *
     * @param  int $num Number which needs to be unrented (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function numberNumDelete($num, $api_version = '1.0')
    {
        $this->numberNumDeleteWithHttpInfo($num, $api_version);
    }

    /**
     * Operation numberNumDeleteWithHttpInfo
     *
     * Unrent number from your account
     *
     * @param  int $num Number which needs to be unrented (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function numberNumDeleteWithHttpInfo($num, $api_version = '1.0')
    {
        $returnType = '';
        $request = $this->numberNumDeleteRequest($num, $api_version);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
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
     * Operation numberNumDeleteAsync
     *
     * Unrent number from your account
     *
     * @param  int $num Number which needs to be unrented (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function numberNumDeleteAsync($num, $api_version = '1.0')
    {
        return $this->numberNumDeleteAsyncWithHttpInfo($num, $api_version)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation numberNumDeleteAsyncWithHttpInfo
     *
     * Unrent number from your account
     *
     * @param  int $num Number which needs to be unrented (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function numberNumDeleteAsyncWithHttpInfo($num, $api_version = '1.0')
    {
        $returnType = '';
        $request = $this->numberNumDeleteRequest($num, $api_version);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'numberNumDelete'
     *
     * @param  int $num Number which needs to be unrented (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function numberNumDeleteRequest($num, $api_version = '1.0')
    {
        // verify the required parameter 'num' is set
        if ($num === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $num when calling numberNumDelete'
            );
        }

        $resourcePath = '/number/{num}/';
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
        if ($num !== null) {
            $resourcePath = str_replace(
                '{' . 'num' . '}',
                ObjectSerializer::toPathValue($num),
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
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation numberNumGet
     *
     * Get details of a number
     *
     * @param  int $num Number for which details need to be fetched (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse2005
     */
    public function numberNumGet($num, $api_version = '1.0')
    {
        list($response) = $this->numberNumGetWithHttpInfo($num, $api_version);
        return $response;
    }

    /**
     * Operation numberNumGetWithHttpInfo
     *
     * Get details of a number
     *
     * @param  int $num Number for which details need to be fetched (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse2005, HTTP status code, HTTP response headers (array of strings)
     */
    public function numberNumGetWithHttpInfo($num, $api_version = '1.0')
    {
        $returnType = '\Swagger\Client\Model\InlineResponse2005';
        $request = $this->numberNumGetRequest($num, $api_version);

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
                        '\Swagger\Client\Model\InlineResponse2005',
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
     * Operation numberNumGetAsync
     *
     * Get details of a number
     *
     * @param  int $num Number for which details need to be fetched (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function numberNumGetAsync($num, $api_version = '1.0')
    {
        return $this->numberNumGetAsyncWithHttpInfo($num, $api_version)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation numberNumGetAsyncWithHttpInfo
     *
     * Get details of a number
     *
     * @param  int $num Number for which details need to be fetched (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function numberNumGetAsyncWithHttpInfo($num, $api_version = '1.0')
    {
        $returnType = '\Swagger\Client\Model\InlineResponse2005';
        $request = $this->numberNumGetRequest($num, $api_version);

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
     * Create request for operation 'numberNumGet'
     *
     * @param  int $num Number for which details need to be fetched (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function numberNumGetRequest($num, $api_version = '1.0')
    {
        // verify the required parameter 'num' is set
        if ($num === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $num when calling numberNumGet'
            );
        }

        $resourcePath = '/number/{num}/';
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
        if ($num !== null) {
            $resourcePath = str_replace(
                '{' . 'num' . '}',
                ObjectSerializer::toPathValue($num),
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
     * Operation numberNumPatch
     *
     * Edit phone number belonging to your account
     *
     * @param  int $num Number which needs to be edited (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     * @param  \Swagger\Client\Model\EditAccountNumber $number Account Number object (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse2005
     */
    public function numberNumPatch($num, $api_version = '1.0', $number = null)
    {
        list($response) = $this->numberNumPatchWithHttpInfo($num, $api_version, $number);
        return $response;
    }

    /**
     * Operation numberNumPatchWithHttpInfo
     *
     * Edit phone number belonging to your account
     *
     * @param  int $num Number which needs to be edited (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     * @param  \Swagger\Client\Model\EditAccountNumber $number Account Number object (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse2005, HTTP status code, HTTP response headers (array of strings)
     */
    public function numberNumPatchWithHttpInfo($num, $api_version = '1.0', $number = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse2005';
        $request = $this->numberNumPatchRequest($num, $api_version, $number);

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
                        '\Swagger\Client\Model\InlineResponse2005',
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
     * Operation numberNumPatchAsync
     *
     * Edit phone number belonging to your account
     *
     * @param  int $num Number which needs to be edited (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     * @param  \Swagger\Client\Model\EditAccountNumber $number Account Number object (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function numberNumPatchAsync($num, $api_version = '1.0', $number = null)
    {
        return $this->numberNumPatchAsyncWithHttpInfo($num, $api_version, $number)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation numberNumPatchAsyncWithHttpInfo
     *
     * Edit phone number belonging to your account
     *
     * @param  int $num Number which needs to be edited (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     * @param  \Swagger\Client\Model\EditAccountNumber $number Account Number object (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function numberNumPatchAsyncWithHttpInfo($num, $api_version = '1.0', $number = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse2005';
        $request = $this->numberNumPatchRequest($num, $api_version, $number);

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
     * Create request for operation 'numberNumPatch'
     *
     * @param  int $num Number which needs to be edited (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     * @param  \Swagger\Client\Model\EditAccountNumber $number Account Number object (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function numberNumPatchRequest($num, $api_version = '1.0', $number = null)
    {
        // verify the required parameter 'num' is set
        if ($num === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $num when calling numberNumPatch'
            );
        }

        $resourcePath = '/number/{num}/';
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
        if ($num !== null) {
            $resourcePath = str_replace(
                '{' . 'num' . '}',
                ObjectSerializer::toPathValue($num),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($number)) {
            $_tempBody = $number;
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
            'PATCH',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation rentNumber
     *
     * Rent a phone number
     *
     * @param  \Swagger\Client\Model\RentNumber $number Rent Details object (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse2012
     */
    public function rentNumber($number, $api_version = '1.0')
    {
        list($response) = $this->rentNumberWithHttpInfo($number, $api_version);
        return $response;
    }

    /**
     * Operation rentNumberWithHttpInfo
     *
     * Rent a phone number
     *
     * @param  \Swagger\Client\Model\RentNumber $number Rent Details object (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse2012, HTTP status code, HTTP response headers (array of strings)
     */
    public function rentNumberWithHttpInfo($number, $api_version = '1.0')
    {
        $returnType = '\Swagger\Client\Model\InlineResponse2012';
        $request = $this->rentNumberRequest($number, $api_version);

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
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse2012',
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
     * Operation rentNumberAsync
     *
     * Rent a phone number
     *
     * @param  \Swagger\Client\Model\RentNumber $number Rent Details object (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function rentNumberAsync($number, $api_version = '1.0')
    {
        return $this->rentNumberAsyncWithHttpInfo($number, $api_version)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation rentNumberAsyncWithHttpInfo
     *
     * Rent a phone number
     *
     * @param  \Swagger\Client\Model\RentNumber $number Rent Details object (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function rentNumberAsyncWithHttpInfo($number, $api_version = '1.0')
    {
        $returnType = '\Swagger\Client\Model\InlineResponse2012';
        $request = $this->rentNumberRequest($number, $api_version);

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
     * Create request for operation 'rentNumber'
     *
     * @param  \Swagger\Client\Model\RentNumber $number Rent Details object (required)
     * @param  string $api_version API Version. If not specified your pinned verison is used. (optional, default to 1.0)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function rentNumberRequest($number, $api_version = '1.0')
    {
        // verify the required parameter 'number' is set
        if ($number === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $number when calling rentNumber'
            );
        }

        $resourcePath = '/number/';
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
        if (isset($number)) {
            $_tempBody = $number;
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
