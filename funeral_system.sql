CREATE DATABASE IF NOT EXISTS funeral_system;
USE funeral_system;

SET FOREIGN_KEY_CHECKS = 0;


-- USERS TABLE
CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO users (id, username, password) VALUES
(1, 'admin', '12345');



-- FUNERALS TABLE
CREATE TABLE funerals (
    id INT NOT NULL AUTO_INCREMENT,
    deceased_name VARCHAR(100) NOT NULL,
    funeral_date DATE NOT NULL,
    location VARCHAR(100) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO funerals 
(id, deceased_name, funeral_date, location)
VALUES
(1, 'dede', '2026-07-29', 'sunyani'),
(6, 'go', '2026-07-30', 'accra');



-- CONTRIBUTORS TABLE
CREATE TABLE contributors (
    id INT NOT NULL AUTO_INCREMENT,
    fullname VARCHAR(100) NOT NULL,
    phone VARCHAR(20) DEFAULT NULL,
    gender VARCHAR(10) DEFAULT NULL,
    address VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO contributors
(id, fullname, phone, gender, address)
VALUES
(1,'Laar Mohammed Inusah','0543188788','Male','PLT41/Q, FIAPRE'),
(2,'joel','0505887251','Male','Post office Box214'),
(3,'Ama','233543188788','Female','kdkkfdkmd lsm mld');
-- CONTRIBUTIONS TABLE
CREATE TABLE contributions (
    id INT NOT NULL AUTO_INCREMENT,
    contributor_id INT NOT NULL,
    funeral_id INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    payment_method VARCHAR(30) DEFAULT NULL,
    contribution_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    CONSTRAINT contributions_ibfk_1 
        FOREIGN KEY (contributor_id) REFERENCES contributors(id)
        ON DELETE CASCADE,
    CONSTRAINT contributions_ibfk_2 
        FOREIGN KEY (funeral_id) REFERENCES funerals(id)
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO contributions
(id, contributor_id, funeral_id, amount, payment_method, contribution_date)
VALUES
(1,1,1,200.00,'Mobile Money','2026-08-20'),
(2,1,1,400.00,'Bank','2026-08-26'),
(3,1,1,400.00,'Bank','2026-08-26'),
(4,1,1,400.00,'Bank','2026-08-26'),
(5,1,1,400.00,'Bank','2026-08-26');


SET FOREIGN_KEY_CHECKS = 1;