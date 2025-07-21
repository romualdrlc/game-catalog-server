<?php

namespace App\Service;

use PDO;
use PDOException;

class MariaDb {

  private static ?PDO $pdo = null;

  public static function getConnection(): PDO {
    if (self::$pdo === null) {
      $dsn = 'mysql:host=127.0.0.1;dbname=game_catalog;charset=utf8mb4';
      $user = 'symfony';
      $password = 'motdepassefort';

      try {
        self::$pdo = new PDO($dsn, $user, $password, [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
      } catch (PDOException $PDOException) {
        throw new \RuntimeException('Erreur de connexion à la base : ' . $PDOException->getMessage());
      }
    }
    return self::$pdo;
  }
}