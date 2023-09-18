package io.programming.security.dao;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import io.programming.security.entity.User;


@Repository
public interface IUserDAO extends JpaRepository<User, String>{
	
}
