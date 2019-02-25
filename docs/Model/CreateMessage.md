# CreateMessage

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**source** | **string** | Sender ID for the message which will be displayed to the receiver. It should specification E.164 with international calling codes.   - When sending a message to US/Canada, the Sender ID must be a number     which belongs to your Karix Subaccount (or main account). | 
**destination** | **string[]** | The destination numbers for the message. | 
**text** | **string** |  | 
**notification_url** | **string** | URL on which message status change notifications will be sent | [optional] 
**notification_method** | **string** | The HTTP method which be be used to send the notification. Defaults to POST if &#x60;notification_url&#x60; is specified. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


