package io.programming.crm.api.dao;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import io.programming.crm.entity.SaleOrder;

@Repository
public interface IOrderDAO extends JpaRepository<SaleOrder, Long>{
	
	public SaleOrder findByRefNumber(String refNumber);
}
