package io.programming.webhook.rest;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RestController;

import io.programming.commons.exceptions.GenericServiceException;
import io.programming.commons.exceptions.ValidateServiceException;
import io.programming.commons.rest.WrapperResponse;
import io.programming.webhook.dto.ListenerDTO;
import io.programming.webhook.dto.MessageDTO;
import io.programming.webhook.services.EventListenerService;

@RestController
public class WebhookREST {

	@Autowired
	private EventListenerService eventListenerService;
	
	@PostMapping(path="listener")
	public WrapperResponse<Void> addListener(@RequestBody ListenerDTO listener) {
		try {
			eventListenerService.addListener(listener);
			return new WrapperResponse<Void>(true, "save success");
		} catch (ValidateServiceException e) {
			return new WrapperResponse<Void>(false, e.getMessage());
		}catch(GenericServiceException e) {
			e.printStackTrace();
			return new WrapperResponse<Void>(false, "Internal server error");
		}
	}
	
	@PostMapping(path="push")
	public WrapperResponse<Void> pushMessage(@RequestBody MessageDTO message) {
		try {
			eventListenerService.pushMessage(message);
			return new WrapperResponse<>(true, "Message sent successfully");
		} catch (ValidateServiceException e) {
			return new WrapperResponse<Void>(false, e.getMessage());
		}catch(GenericServiceException e) {
			e.printStackTrace();
			return new WrapperResponse<Void>(false, "Internal server error");
		}
	}
}
