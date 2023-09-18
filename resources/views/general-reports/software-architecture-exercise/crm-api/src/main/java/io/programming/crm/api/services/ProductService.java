package io.programming.crm.api.services;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import io.programming.crm.api.dao.IProductDAO;
import io.programming.crm.converters.ProductConverter;
import io.programming.crm.dto.ProductDTO;
import io.programming.crm.entity.Product;

@Component
public class ProductService {

	@Autowired
	private IProductDAO productDAO;
	
	public List<ProductDTO> getAllProducts() throws Exception{
		try {
			ProductConverter converter= new ProductConverter();
			return converter.toDtoList(productDAO.findAll());
		} catch (Exception e) {
			e.printStackTrace();
			throw new Exception(e.getMessage(),e);
		}
	}
	
	public Long createProduct(ProductDTO product) {
		ProductConverter converter = new ProductConverter();
		Product newProduct = converter.toEntity(product);
		newProduct = productDAO.save(newProduct);
		return newProduct.getId();
	}
}
