CREATE TABLE IF NOT EXISTS interaction_learn (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(255) NOT NULL UNIQUE,
  quantity INT UNSIGNED DEFAULT 0 NOT NULL,
  product_description VARCHAR(1000) NOT NULL,
  price FLOAT UNSIGNED DEFAULT 0,
  income_date DATETIME DEFAULT CURRENT_TIMESTAMP,
  excise_goods BOOL
);

CREATE TABLE IF NOT EXISTS test (
  id INT AUTO_INCREMENT PRIMARY KEY,
  value_1 INT UNIQUE NOT NULL
);

DROP TABLE test;

INSERT INTO interaction_learn(
  product_name, quantity, product_description, price, excise_goods)
  VALUES("Vodka", 3, "very low quality", 33.60, true );

INSERT INTO interaction_learn(
  product_name, quantity, product_description, price, excise_goods)
  VALUES("bread", 1, "white", 21.36, false );

INSERT INTO interaction_learn(
  product_name, quantity, product_description, price, excise_goods)
  VALUES("Sunflower oil", 10, "Ukrainian", 21.80, false );

UPDATE interaction_learn
SET product_name = "Bread"
WHERE id = 3;

ALTER TABLE interaction_learn
CHANGE product_description product_desc VARCHAR(1000) NOT NULL;

ALTER TABLE interaction_learn
RENAME COLUMN product_name TO item_name;

INSERT INTO interaction_learn(
  item_name, quantity, product_desc, price, excise_goods)
  VALUES
  ("Whiskey", 5, "premium quality", 120.00, false),
  ("Beer", 10, "light and refreshing", 15.20, true),
  ("Wine", 7, "red dry wine", 45.80, false),
  ("Rum", 2, "strong and sweet", 75.50, true),
  ("Tequila", 6, "classic spirit", 90.30, false);

ALTER TABLE interaction_learn
ADD COLUMN category_id INT;



CREATE TABLE IF NOT EXISTS interaction_categories (
  category_id INT AUTO_INCREMENT PRIMARY KEY,
  category_name VARCHAR(255) NOT NULL UNIQUE
);

INSERT INTO interaction_categories (category_name)
VALUES ('Alcohol'), ('Soft Drinks'), ('Snacks');

ALTER TABLE interaction_learn
ADD CONSTRAINT fk_category FOREIGN KEY (category_id) REFERENCES interaction_categories(category_id);

UPDATE interaction_learn
SET category_id = 1
WHERE item_name IN ('Vodka', 'Whiskey', 'Tequila', 'Rum');

UPDATE interaction_learn
SET category_id = 2
WHERE item_name IN ('Wine', 'Beer');

UPDATE interaction_learn
SET category_id = 3
WHERE item_name IN ('Bread', 'Sunflower oil');

UPDATE interaction_learn
SET excise_goods = true
WHERE item_name IN ('Vodka', 'Whiskey', 'Tequila', 'Rum');

SELECT * FROM interaction_learn il 
LEFT JOIN interaction_categories ic 
ON il.category_id = ic.category_id
WHERE category_name LIKE 'Soft Drinks';

SELECT item_name, product_desc 
FROM interaction_learn il 
RIGHT JOIN interaction_categories ic 
ON il.category_id = ic.category_id
WHERE excise_goods LIKE false;


