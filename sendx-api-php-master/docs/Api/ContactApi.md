# Swagger\Client\ContactApi

All URIs are relative to *https://app.sendx.io/api/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**contactIdentifyPost**](ContactApi.md#contactIdentifyPost) | **POST** /contact/identify | Identify a contact as user
[**contactTrackPost**](ContactApi.md#contactTrackPost) | **POST** /contact/track | Add tracking info using tags to a contact


# **contactIdentifyPost**
> \Swagger\Client\Model\ContactResponse contactIdentifyPost($api_key, $team_id, $contact_details)

Identify a contact as user



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ContactApi();
$api_key = "api_key_example"; // string | 
$team_id = "team_id_example"; // string | 
$contact_details = new \Swagger\Client\Model\ContactRequest(); // \Swagger\Client\Model\ContactRequest | Contact details

try {
    $result = $api_instance->contactIdentifyPost($api_key, $team_id, $contact_details);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactApi->contactIdentifyPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **team_id** | **string**|  |
 **contact_details** | [**\Swagger\Client\Model\ContactRequest**](../Model/\Swagger\Client\Model\ContactRequest.md)| Contact details |

### Return type

[**\Swagger\Client\Model\ContactResponse**](../Model/ContactResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **contactTrackPost**
> \Swagger\Client\Model\TrackResponse contactTrackPost($api_key, $team_id, $email, $track_details)

Add tracking info using tags to a contact



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ContactApi();
$api_key = "api_key_example"; // string | 
$team_id = "team_id_example"; // string | 
$email = "email_example"; // string | 
$track_details = new \Swagger\Client\Model\TrackRequest(); // \Swagger\Client\Model\TrackRequest | Track Details

try {
    $result = $api_instance->contactTrackPost($api_key, $team_id, $email, $track_details);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactApi->contactTrackPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **team_id** | **string**|  |
 **email** | **string**|  |
 **track_details** | [**\Swagger\Client\Model\TrackRequest**](../Model/\Swagger\Client\Model\TrackRequest.md)| Track Details |

### Return type

[**\Swagger\Client\Model\TrackResponse**](../Model/TrackResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

