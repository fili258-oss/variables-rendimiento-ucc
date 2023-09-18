package io.programming.mail.rest;

import org.apache.commons.lang.builder.ReflectionToStringBuilder;
import org.apache.commons.lang.builder.ToStringStyle;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RestController;

import brave.Tracer;
import io.programming.commons.email.EmailDTO;
import io.programming.mail.dto.MailMessage;
import io.programming.mail.services.MailSenderService;

@RestController("mail")
public class MailSenderREST {

	@Autowired
	private MailSenderService mailSenderService;
	
	@PostMapping
	public void sendMail(@RequestBody EmailDTO message) {
		mailSenderService.sendSimpleMessage(message);	
	}
}
