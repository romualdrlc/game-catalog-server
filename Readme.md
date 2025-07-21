### Mariadb creation database

```bash
CREATE DATABASE game_catalog CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'symfony'@'localhost' IDENTIFIED BY 'motdepassefort';
GRANT ALL PRIVILEGES ON game_catalog.* TO 'symfony'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

## Lancement en mode http pour contrer le probleme de cors : symfony serve --no-tls

