<?php
/**
 * AssociationsApi
 * PHP version 5
 *
 * @category Class
 * @package  HubSpot\Client\Crm\Contacts
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Contacts
 *
 * Why don't you just tell me the movie you've selected or the description you expect to see here?
 *
 * The version of the OpenAPI document: v3
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 4.2.2
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace HubSpot\Client\Crm\Contacts\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use HubSpot\Client\Crm\Contacts\ApiException;
use HubSpot\Client\Crm\Contacts\Configuration;
use HubSpot\Client\Crm\Contacts\HeaderSelector;
use HubSpot\Client\Crm\Contacts\ObjectSerializer;

/**
 * AssociationsApi Class Doc Comment
 *
 * @category Class
 * @package  HubSpot\Client\Crm\Contacts
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class AssociationsApi
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
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $host_index (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $host_index = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $host_index;
    }

    /**
     * Set the host index
     *
     * @param  int Host index (required)
     */
    public function setHostIndex($host_index)
    {
        $this->hostIndex = $host_index;
    }

    /**
     * Get the host index
     *
     * @return Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation archiveAssociation
     *
     * Remove an association between two contacts
     *
     * @param  string $contact_id contact_id (required)
     * @param  string $associated_object_type associated_object_type (required)
     * @param  string $to_object_id to_object_id (required)
     *
     * @throws \HubSpot\Client\Crm\Contacts\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function archiveAssociation($contact_id, $associated_object_type, $to_object_id)
    {
        $this->archiveAssociationWithHttpInfo($contact_id, $associated_object_type, $to_object_id);
    }

    /**
     * Operation archiveAssociationWithHttpInfo
     *
     * Remove an association between two contacts
     *
     * @param  string $contact_id (required)
     * @param  string $associated_object_type (required)
     * @param  string $to_object_id (required)
     *
     * @throws \HubSpot\Client\Crm\Contacts\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function archiveAssociationWithHttpInfo($contact_id, $associated_object_type, $to_object_id)
    {
        $request = $this->archiveAssociationRequest($contact_id, $associated_object_type, $to_object_id);

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
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Crm\Contacts\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation archiveAssociationAsync
     *
     * Remove an association between two contacts
     *
     * @param  string $contact_id (required)
     * @param  string $associated_object_type (required)
     * @param  string $to_object_id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function archiveAssociationAsync($contact_id, $associated_object_type, $to_object_id)
    {
        return $this->archiveAssociationAsyncWithHttpInfo($contact_id, $associated_object_type, $to_object_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation archiveAssociationAsyncWithHttpInfo
     *
     * Remove an association between two contacts
     *
     * @param  string $contact_id (required)
     * @param  string $associated_object_type (required)
     * @param  string $to_object_id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function archiveAssociationAsyncWithHttpInfo($contact_id, $associated_object_type, $to_object_id)
    {
        $returnType = '';
        $request = $this->archiveAssociationRequest($contact_id, $associated_object_type, $to_object_id);

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
     * Create request for operation 'archiveAssociation'
     *
     * @param  string $contact_id (required)
     * @param  string $associated_object_type (required)
     * @param  string $to_object_id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function archiveAssociationRequest($contact_id, $associated_object_type, $to_object_id)
    {
        // verify the required parameter 'contact_id' is set
        if ($contact_id === null || (is_array($contact_id) && count($contact_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $contact_id when calling archiveAssociation'
            );
        }
        // verify the required parameter 'associated_object_type' is set
        if ($associated_object_type === null || (is_array($associated_object_type) && count($associated_object_type) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $associated_object_type when calling archiveAssociation'
            );
        }
        // verify the required parameter 'to_object_id' is set
        if ($to_object_id === null || (is_array($to_object_id) && count($to_object_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $to_object_id when calling archiveAssociation'
            );
        }

        $resourcePath = '/contacts/{contactId}/associations/{associatedObjectType}/{toObjectId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($contact_id !== null) {
            $resourcePath = str_replace(
                '{' . 'contactId' . '}',
                ObjectSerializer::toPathValue($contact_id),
                $resourcePath
            );
        }
        // path params
        if ($associated_object_type !== null) {
            $resourcePath = str_replace(
                '{' . 'associatedObjectType' . '}',
                ObjectSerializer::toPathValue($associated_object_type),
                $resourcePath
            );
        }
        // path params
        if ($to_object_id !== null) {
            $resourcePath = str_replace(
                '{' . 'toObjectId' . '}',
                ObjectSerializer::toPathValue($to_object_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['*/*'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
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

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('hapikey');
        if ($apiKey !== null) {
            $queryParams['hapikey'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
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
     * Operation createAssociation
     *
     * Associate two contacts
     *
     * @param  string $contact_id contact_id (required)
     * @param  string $associated_object_type associated_object_type (required)
     * @param  string $to_object_id to_object_id (required)
     *
     * @throws \HubSpot\Client\Crm\Contacts\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \HubSpot\Client\Crm\Contacts\Model\SimplePublicObject|\HubSpot\Client\Crm\Contacts\Model\Error
     */
    public function createAssociation($contact_id, $associated_object_type, $to_object_id)
    {
        list($response) = $this->createAssociationWithHttpInfo($contact_id, $associated_object_type, $to_object_id);
        return $response;
    }

    /**
     * Operation createAssociationWithHttpInfo
     *
     * Associate two contacts
     *
     * @param  string $contact_id (required)
     * @param  string $associated_object_type (required)
     * @param  string $to_object_id (required)
     *
     * @throws \HubSpot\Client\Crm\Contacts\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \HubSpot\Client\Crm\Contacts\Model\SimplePublicObject|\HubSpot\Client\Crm\Contacts\Model\Error, HTTP status code, HTTP response headers (array of strings)
     */
    public function createAssociationWithHttpInfo($contact_id, $associated_object_type, $to_object_id)
    {
        $request = $this->createAssociationRequest($contact_id, $associated_object_type, $to_object_id);

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
            switch($statusCode) {
                case 200:
                    if ('\HubSpot\Client\Crm\Contacts\Model\SimplePublicObject' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Crm\Contacts\Model\SimplePublicObject', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('\HubSpot\Client\Crm\Contacts\Model\Error' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Crm\Contacts\Model\Error', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\HubSpot\Client\Crm\Contacts\Model\SimplePublicObject';
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
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
                        '\HubSpot\Client\Crm\Contacts\Model\SimplePublicObject',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Crm\Contacts\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createAssociationAsync
     *
     * Associate two contacts
     *
     * @param  string $contact_id (required)
     * @param  string $associated_object_type (required)
     * @param  string $to_object_id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAssociationAsync($contact_id, $associated_object_type, $to_object_id)
    {
        return $this->createAssociationAsyncWithHttpInfo($contact_id, $associated_object_type, $to_object_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createAssociationAsyncWithHttpInfo
     *
     * Associate two contacts
     *
     * @param  string $contact_id (required)
     * @param  string $associated_object_type (required)
     * @param  string $to_object_id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAssociationAsyncWithHttpInfo($contact_id, $associated_object_type, $to_object_id)
    {
        $returnType = '\HubSpot\Client\Crm\Contacts\Model\SimplePublicObject';
        $request = $this->createAssociationRequest($contact_id, $associated_object_type, $to_object_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
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
     * Create request for operation 'createAssociation'
     *
     * @param  string $contact_id (required)
     * @param  string $associated_object_type (required)
     * @param  string $to_object_id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createAssociationRequest($contact_id, $associated_object_type, $to_object_id)
    {
        // verify the required parameter 'contact_id' is set
        if ($contact_id === null || (is_array($contact_id) && count($contact_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $contact_id when calling createAssociation'
            );
        }
        // verify the required parameter 'associated_object_type' is set
        if ($associated_object_type === null || (is_array($associated_object_type) && count($associated_object_type) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $associated_object_type when calling createAssociation'
            );
        }
        // verify the required parameter 'to_object_id' is set
        if ($to_object_id === null || (is_array($to_object_id) && count($to_object_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $to_object_id when calling createAssociation'
            );
        }

        $resourcePath = '/contacts/{contactId}/associations/{associatedObjectType}/{toObjectId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($contact_id !== null) {
            $resourcePath = str_replace(
                '{' . 'contactId' . '}',
                ObjectSerializer::toPathValue($contact_id),
                $resourcePath
            );
        }
        // path params
        if ($associated_object_type !== null) {
            $resourcePath = str_replace(
                '{' . 'associatedObjectType' . '}',
                ObjectSerializer::toPathValue($associated_object_type),
                $resourcePath
            );
        }
        // path params
        if ($to_object_id !== null) {
            $resourcePath = str_replace(
                '{' . 'toObjectId' . '}',
                ObjectSerializer::toPathValue($to_object_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', '*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', '*/*'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
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

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('hapikey');
        if ($apiKey !== null) {
            $queryParams['hapikey'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
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
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getAssociations
     *
     * List associations of a contact by type
     *
     * @param  string $contact_id contact_id (required)
     * @param  string $associated_object_type associated_object_type (required)
     *
     * @throws \HubSpot\Client\Crm\Contacts\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \HubSpot\Client\Crm\Contacts\Model\CollectionResponseSimplePublicObjectId|\HubSpot\Client\Crm\Contacts\Model\Error
     */
    public function getAssociations($contact_id, $associated_object_type)
    {
        list($response) = $this->getAssociationsWithHttpInfo($contact_id, $associated_object_type);
        return $response;
    }

    /**
     * Operation getAssociationsWithHttpInfo
     *
     * List associations of a contact by type
     *
     * @param  string $contact_id (required)
     * @param  string $associated_object_type (required)
     *
     * @throws \HubSpot\Client\Crm\Contacts\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \HubSpot\Client\Crm\Contacts\Model\CollectionResponseSimplePublicObjectId|\HubSpot\Client\Crm\Contacts\Model\Error, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAssociationsWithHttpInfo($contact_id, $associated_object_type)
    {
        $request = $this->getAssociationsRequest($contact_id, $associated_object_type);

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
            switch($statusCode) {
                case 200:
                    if ('\HubSpot\Client\Crm\Contacts\Model\CollectionResponseSimplePublicObjectId' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Crm\Contacts\Model\CollectionResponseSimplePublicObjectId', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('\HubSpot\Client\Crm\Contacts\Model\Error' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Crm\Contacts\Model\Error', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\HubSpot\Client\Crm\Contacts\Model\CollectionResponseSimplePublicObjectId';
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
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
                        '\HubSpot\Client\Crm\Contacts\Model\CollectionResponseSimplePublicObjectId',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Crm\Contacts\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getAssociationsAsync
     *
     * List associations of a contact by type
     *
     * @param  string $contact_id (required)
     * @param  string $associated_object_type (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAssociationsAsync($contact_id, $associated_object_type)
    {
        return $this->getAssociationsAsyncWithHttpInfo($contact_id, $associated_object_type)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAssociationsAsyncWithHttpInfo
     *
     * List associations of a contact by type
     *
     * @param  string $contact_id (required)
     * @param  string $associated_object_type (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAssociationsAsyncWithHttpInfo($contact_id, $associated_object_type)
    {
        $returnType = '\HubSpot\Client\Crm\Contacts\Model\CollectionResponseSimplePublicObjectId';
        $request = $this->getAssociationsRequest($contact_id, $associated_object_type);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
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
     * Create request for operation 'getAssociations'
     *
     * @param  string $contact_id (required)
     * @param  string $associated_object_type (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getAssociationsRequest($contact_id, $associated_object_type)
    {
        // verify the required parameter 'contact_id' is set
        if ($contact_id === null || (is_array($contact_id) && count($contact_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $contact_id when calling getAssociations'
            );
        }
        // verify the required parameter 'associated_object_type' is set
        if ($associated_object_type === null || (is_array($associated_object_type) && count($associated_object_type) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $associated_object_type when calling getAssociations'
            );
        }

        $resourcePath = '/contacts/{contactId}/associations/{associatedObjectType}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($contact_id !== null) {
            $resourcePath = str_replace(
                '{' . 'contactId' . '}',
                ObjectSerializer::toPathValue($contact_id),
                $resourcePath
            );
        }
        // path params
        if ($associated_object_type !== null) {
            $resourcePath = str_replace(
                '{' . 'associatedObjectType' . '}',
                ObjectSerializer::toPathValue($associated_object_type),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', '*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', '*/*'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
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

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('hapikey');
        if ($apiKey !== null) {
            $queryParams['hapikey'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
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