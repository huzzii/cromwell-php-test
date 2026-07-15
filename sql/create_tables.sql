-- ==========================================
-- Cromwell PHP Test Database Script
-- PostgreSQL 17
-- ==========================================

DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id SERIAL PRIMARY KEY,

    forenames VARCHAR(100) NOT NULL,
    surname VARCHAR(100) NOT NULL,
    title VARCHAR(20),

    date_of_birth DATE NOT NULL,

    mobile_phone VARCHAR(20) NOT NULL,
    other_phone VARCHAR(20),

    email VARCHAR(255) NOT NULL UNIQUE,

    password_hash VARCHAR(255) NOT NULL,

    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE INDEX idx_users_email
ON users(email);