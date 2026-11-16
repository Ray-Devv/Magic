CREATE TABLE CARD (
    id CHAR(36) NOT NULL,
    name VARCHAR(255) NOT NULL,
    cost VARCHAR(50) NOT NULL,
    types VARCHAR(255) NOT NULL,
    textbox TEXT,
    flavortext TEXT,
    extension VARCHAR(100) NOT NULL,
    illustrator VARCHAR(255),
    rarity VARCHAR(50) NOT NULL,
    url_img VARCHAR(255) NOT NULL,
    power INT,
    toughness INT,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- TEST
INSERT INTO CARD (id, name, cost, types, textbox, flavortext, extension, illustrator, rarity, url_img, power, toughness) VALUES
('019334a0-0000-7000-8000-000000000001', 'Test', '{R}', 'A', 'A', 'A', 'A', 'A', 'Uncommon', 'test', NULL, NULL),
