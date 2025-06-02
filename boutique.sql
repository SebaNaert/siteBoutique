CREATE DATABASE IF NOT EXISTS boutique;
USE boutique;

CREATE TABLE IF NOT EXISTS produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    image VARCHAR(255),
    description TEXT,
    prix DECIMAL(10,2)
);


INSERT INTO `produits` (`id`, `nom`, `image`, `description`, `prix`) VALUES
(1, 'Chaise', 'images/chaise.jpg', 'Une chaise confortable.', 49.99),
(2, 'ampoule', 'images/lampe.jpg', '927 Blanc Très Chaud\r\nA60 (forme exacte)\r\nDépolie', 2.99);
COMMIT;