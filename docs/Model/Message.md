# Message

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**uid** | **string** | Unique ID for a message sent or received | [optional] 
**account_uid** | **string** | Unique ID of Account which created this message | [optional] 
**source** | **string** | Sender ID for the message | [optional] 
**destination** | **string** | Destination number for the message in E.164 format | [optional] 
**status** | **string** | Current status of the message. Possible values: - &#x60;queued&#x60;: Message has been queued in Karix system             (for either &#x60;inbound&#x60; or &#x60;outbound&#x60; direction) - &#x60;sent&#x60;: The &#x60;outbound&#x60; message has been sent to carriers for delivery - &#x60;failed&#x60;: In case of &#x60;outbound&#x60; message, this means that Karix failed             to send the message to a carrier.             In case of &#x60;inbound&#x60; message, this means that Karix failed             to send the message to its webhook, if configured. - &#x60;delivered&#x60;: The &#x60;outbound&#x60; message was delivered to its receiver. - &#x60;undelivered&#x60;: The &#x60;outbound&#x60; message falied to be delivered to its receiver. - &#x60;rejected&#x60;: The &#x60;outbound&#x60; message was rejected by the chosen carrier. | [optional] 
**text** | **string** | Text of the message to be sent. - Message can contain non-GSM and unicode characters - A GSM only message with more than 160 characters will be automatically broken   into parts each of length 153 for billing purposes - A Non-GSM (and unicode) message with more than 70 characters will be automatically   broken into parts each of length 67 for billing purposes | [optional] 
**queued_time** | [**\DateTime**](\DateTime.md) | The timestamp when message was accepted and queued in Karix system | [optional] 
**sent_time** | [**\DateTime**](\DateTime.md) | The timestamp when the message was processed and sent to destination | [optional] 
**updated_time** | [**\DateTime**](\DateTime.md) | The timestamp when the status of message was last updated. - If the current status is &#x60;delivered&#x60; then this timestamp also represents   delivered time - If the current status is &#x60;undelivered&#x60; then this timestamp also represents   undelivered time | [optional] 
**direction** | **string** | Direction of the message. - inbound: Message was sent to a number owned by the karix account - outbound: Message was sent to a destination using karix account | [optional] 
**error** | [**\Swagger\Client\Model\MessageError**](MessageError.md) |  | [optional] 
**rate** | [**BigDecimal**](BigDecimal.md) | Cost per part of this message. Refer to [&#x60;text&#x60;](#/definitions/Message/properties/text) | [optional] 
**refund** | [**BigDecimal**](BigDecimal.md) | In case we are unable to send the message to destination after queueing we will refund the &#x60;total_cost&#x60; you were charged. &#x60;null&#x60; if there was no refund. | [optional] 
**total_cost** | **string** | Total cost for this message including all parts. Refer to [&#x60;text&#x60;](#/definitions/Message/properties/text) | [optional] 
**parts** | **int** | Number of parts to the message if the message was too long Refer to [&#x60;text&#x60;](#/definitions/Message/properties/text) | [optional] 
**message_type** | **string** |  | [optional] 
**mobile_country_code** | **string** | Mobile Country Code of the destination number. Refer to [Wikipedia: Mobile country code](https://en.wikipedia.org/wiki/Mobile_country_code) | [optional] 
**mobile_network_code** | **string** | Mobile Network Code of the destination number. Refer to [Wikipedia: Mobile country code](https://en.wikipedia.org/wiki/Mobile_country_code) | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


