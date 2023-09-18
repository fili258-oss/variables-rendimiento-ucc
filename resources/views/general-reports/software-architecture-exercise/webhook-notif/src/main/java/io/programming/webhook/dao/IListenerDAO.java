package io.programming.webhook.dao;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import io.programming.webhook.entity.Listener;
import io.programming.webhook.enums.EventType;

@Repository
public interface IListenerDAO extends JpaRepository<Listener, Long>{
	public List<Listener> findByEventType(EventType eventType);
}
