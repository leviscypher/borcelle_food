CREATE TABLE users (
  user_id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  phone_number VARCHAR(20),
  profile_picture VARCHAR(255)
);

CREATE TABLE friends (
  user_id INT,
  friend_id INT,
  PRIMARY KEY (user_id, friend_id),
  FOREIGN KEY (user_id) REFERENCES users (user_id),
  FOREIGN KEY (friend_id) REFERENCES users (user_id)
);

CREATE TABLE posts (
  post_id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT,
  content TEXT NOT NULL,
  post_time DATETIME NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users (user_id)
);

CREATE TABLE comments (
  comment_id INT PRIMARY KEY AUTO_INCREMENT,
  post_id INT,
  user_id INT,
  content TEXT NOT NULL,
  comment_time DATETIME NOT NULL,
  FOREIGN KEY (post_id) REFERENCES posts (post_id),
  FOREIGN KEY (user_id) REFERENCES users (user_id)
);

CREATE TABLE likes (
  like_id INT PRIMARY KEY AUTO_INCREMENT,
  post_id INT,
  user_id INT,
  FOREIGN KEY (post_id) REFERENCES posts (post_id),
  FOREIGN KEY (user_id) REFERENCES users (user_id)
);

CREATE TABLE groups (
  group_id INT PRIMARY KEY AUTO_INCREMENT,
  group_name VARCHAR(255) NOT NULL,
  description TEXT,
  admin_id INT,
  FOREIGN KEY (admin_id) REFERENCES users (user_id)
);
