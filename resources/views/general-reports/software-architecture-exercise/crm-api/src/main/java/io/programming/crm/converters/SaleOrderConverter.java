package io.programming.crm.converters;

import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.HashSet;

import io.programming.crm.converters.utils.AbstractConverter;
import io.programming.crm.dto.OrderLineDTO;
import io.programming.crm.dto.PaymentDTO;
import io.programming.crm.dto.SaleOrderDTO;
import io.programming.crm.entity.OrderLine;
import io.programming.crm.entity.OrderStatus;
import io.programming.crm.entity.Payment;
import io.programming.crm.entity.SaleOrder;

public class SaleOrderConverter extends AbstractConverter<SaleOrder, SaleOrderDTO> {
	
	private DateFormat dateFormat = new SimpleDateFormat("dd/MM/yyyy hh:mm:ss");

	@Override
	public SaleOrder toEntity(SaleOrderDTO dto) {
		
		SaleOrder saleOrder = new SaleOrder();
		saleOrder.setCustomerEmail(dto.getCustomerEmail());
		saleOrder.setCustomerName(dto.getCustomerName());
		saleOrder.setId(dto.getId());
		saleOrder.setRefNumber(dto.getRefNumber());
		saleOrder.setTotal(dto.getTotal());
		saleOrder.setStatus(OrderStatus.valueOf(dto.getStatus()));
		
		try {
			Calendar regitDate = Calendar.getInstance();
			regitDate.setTime(dateFormat.parse(dto.getRegistDate()));
			saleOrder.setRegistDate(regitDate);
		} catch (Exception e) {
			e.printStackTrace();
		}
		
		
		ProductConverter productConverter = new ProductConverter();
		if(dto.getOrderLines() != null) {
			saleOrder.setOrderLines(new HashSet<>());
			for(OrderLineDTO lineDTO : dto.getOrderLines()) {
				OrderLine line = new OrderLine();
				line.setId(lineDTO.getId());
				line.setProduct(productConverter.toEntity(lineDTO.getProduct()));
				line.setQuantity(lineDTO.getQuantity());
				line.setSaleOrder(saleOrder);
				saleOrder.getOrderLines().add(line);
			}
		}
		
		return saleOrder;
		
	}

	@Override
	public SaleOrderDTO toDTO(SaleOrder entity) {
		SaleOrderDTO saleOrderDTO = new SaleOrderDTO();
		saleOrderDTO.setCustomerEmail(entity.getCustomerEmail());
		saleOrderDTO.setCustomerName(entity.getCustomerName());
		saleOrderDTO.setId(entity.getId());
		saleOrderDTO.setRefNumber(entity.getRefNumber());
		saleOrderDTO.setTotal(entity.getTotal());
		saleOrderDTO.setRegistDate(dateFormat.format(entity.getRegistDate().getTime()));
		saleOrderDTO.setStatus(entity.getStatus().toString());
		
		ProductConverter productConverter = new ProductConverter();
		if(entity.getOrderLines() != null) {
			saleOrderDTO.setOrderLines(new HashSet<>());
			for(OrderLine line : entity.getOrderLines()) {
				OrderLineDTO lineDTO = new OrderLineDTO();
				lineDTO.setId(line.getId());
				lineDTO.setProduct(productConverter.toDTO(line.getProduct()));
				lineDTO.setQuantity(line.getQuantity());
				saleOrderDTO.getOrderLines().add(lineDTO);
			}
		}
		
		DateFormat dateFormat = new SimpleDateFormat("dd/MM/yyyy hh:mm:ss");
		
		Payment payment = entity.getPayment();
		if(payment != null) {
			PaymentDTO paymentDTO = new PaymentDTO();
			paymentDTO.setId(payment.getId());
			paymentDTO.setPaymentMethod(payment.getPaymentMethod().name());
			if(payment.getPaydate()!=null)
				paymentDTO.setPaydate(dateFormat.format(payment.getPaydate().getTime()));
			
			saleOrderDTO.setPayment(paymentDTO);
		}
		
		return saleOrderDTO;
	}

}
