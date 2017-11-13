USE sales;

CREATE TABLE products (
	id INT AUTO_INCREMENT PRIMARY KEY,
	description VARCHAR(255) NOT NULL,
	inventory INT NOT NULL,
	sold INT NOT NULL DEFAULT 0
);

INSERT INTO products (description, inventory, sold) VALUES ("Apple", 3, 15), ("Banana", 10, 2), ("Grape", 0, 30);