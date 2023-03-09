CREATE TABLE users (
user_id INT(11) PRIMARY KEY,
username VARCHAR(50) NOT NULL,
password VARCHAR(255) NOT NULL,
email VARCHAR(50) NOT NULL,
full_name VARCHAR(100) NOT NULL,
phone_number VARCHAR(20) NOT NULL,
address VARCHAR(255) NOT NULL,
role ENUM('customer', 'salesperson') NOT NULL
);

CREATE TABLE customers (
customer_id INT(11) PRIMARY KEY,
user_id INT(11),
delivery_address VARCHAR(255) NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE products (
product_id INT(11) PRIMARY KEY,
name VARCHAR(255) NOT NULL,
description TEXT,
price DECIMAL(10,2) NOT NULL,
quantity INT(11) NOT NULL,
image_path VARCHAR(255) NOT NULL
);

CREATE TABLE orders (
order_id INT(11) PRIMARY KEY,
customer_id INT(11),
total_amount DECIMAL(10,2) NOT NULL,
order_date DATETIME NOT NULL,
status ENUM('pending', 'shipping', 'delivered', 'canceled') NOT NULL,
FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
);

CREATE TABLE order_details (
detail_id INT(11) PRIMARY KEY,
order_id INT(11),
product_id INT(11),
quantity INT(11) NOT NULL,
price DECIMAL(10,2) NOT NULL,
total_amount DECIMAL(10,2) NOT NULL,
FOREIGN KEY (order_id) REFERENCES orders(order_id),
FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE carts (
cart_id INT(11) PRIMARY KEY,
customer_id INT(11),
product_id INT(11),
quantity INT(11) NOT NULL,
price DECIMAL(10,2) NOT NULL,
FOREIGN KEY (customer_id) REFERENCES customers(customer_id),
FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE promotions (
promo_id INT(11) PRIMARY KEY,
name VARCHAR(255) NOT NULL,
description TEXT,
start_date DATETIME NOT NULL,
end_date DATETIME NOT NULL,
discount DECIMAL(10,2) NOT NULL
);

CREATE TABLE product_reviews (
review_id INT(11) PRIMARY KEY,
customer_id INT(11),
product_id INT(11),
content TEXT NOT NULL,
rating INT(11) NOT NULL,
review_date DATETIME NOT NULL,
FOREIGN KEY (customer_id) REFERENCES customers(customer_id),
FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE news (
news_id INT(11) PRIMARY KEY,
title VARCHAR(255) NOT NULL,
content TEXT NOT NULL,
publish_date DATETIME NOT NULL
);