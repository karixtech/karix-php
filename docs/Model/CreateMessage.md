# CreateMessage

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**channel** | **string** | Channel to use to send message over Supported Channels: sms, whatsapp | [optional] [default to 'sms']
**source** | **string** | Sender ID for the message which will be displayed to the receiver. It should specification E.164 with international calling codes.   - When sending a message to US/Canada, &#x60;source&#x60; must be a number     which belongs to your Karix Subaccount (or main account).   - When sending a message over &#x60;whatsapp&#x60; channel, &#x60;source&#x60; must be the     whatsapp sandbox number from your dashboard or a Whatsapp enabled number     added to your account. | 
**destination** | **string[]** | The destination numbers for the message.   - When sending a message over &#x60;whatsapp&#x60; channel, the &#x60;destination&#x60; array     must contain only one phone number. | 
**content** | [**\Karix\Model\CreateMessageContent**](CreateMessageContent.md) |  | 
**events_url** | **string** | Status change events for the &#x60;queued&#x60; messages will be sent to &#x60;events_url&#x60;.   - Please read more about [Karix Events](#section/Events-and-Webhooks) structure.   - A message sent over &#x60;whatsapp&#x60; channel might generate a &#x60;read&#x60; event directly     and skip the &#x60;delivered&#x60; event. A message for which you receive a &#x60;read&#x60; event     should be considered &#x60;delivered&#x60; as well. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


