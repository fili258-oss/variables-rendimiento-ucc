package io.programming.crm.feign.clients;

import org.springframework.cloud.openfeign.FeignClient;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;

import io.programming.commons.dto.LoginResponseDTO;
import io.programming.commons.rest.WrapperResponse;

@FeignClient("security/")
public interface SecurityServiceFeignClient {

	@GetMapping(path="token/validate")
	public WrapperResponse<LoginResponseDTO> tokenValidate(@RequestParam("token") String token);
}
