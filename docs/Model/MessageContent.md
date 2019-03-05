# MessageContent

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**text** | **string** | Text content to be sent to destinations. For &#x60;sms&#x60; channel: - Message can contain non-GSM and unicode characters - A GSM only message with more than 160 characters will be automatically broken   into parts each of length 153 for billing purposes - A Non-GSM (and unicode) message with more than 70 characters will be automatically   broken into parts each of length 67 for billing purposes | [optional] 
**location** | [**\Karix\Model\MessageContentLocation**](MessageContentLocation.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


