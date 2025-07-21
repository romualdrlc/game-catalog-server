<?php

namespace App\Repository;

use App\Entity\Game;
use App\Entity\Platform;
use App\Service\MariaDb;
use Error;
use Exception;
use PDO;

class GameRepository {

  private PDO $pdo;

  public function __construct() {
    $this->pdo = MariaDb::getConnection();
  }

  /**
   * @return Game[]
   * @throws Exception
   */
  public function getGameList(): array {
    $sql = <<< 'SQL'
        SELECT
            id,
            code,
            name,
            slug,
            summary,
            release_date,
            price,
            platform,
            cover_url 
        FROM games;
    SQL;

    $stmt = $this->pdo->query($sql);
    $data = $stmt->fetchAll();
    $gameList = [];
    foreach ($data as $gameData) {
      $gameList[] = $this->getGame($gameData);
    }
    return $gameList;
  }

  /**
   * @throws Exception
   */
  public function getGameBySlug(string $slug): Game {
    $sql = <<< 'SQL'
        SELECT 
            id,
            code,
            name,
            slug,
            summary,
            release_date,
            price,
            platform,
            cover_url
        FROM games
        WHERE slug = :slug;
    SQL;

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['slug' => $slug]);
    $data = $stmt->fetch();
    return $this->getGame($data);
  }

  /**
   * @return string[]
   * @throws Exception
   */
  public function getPlatformList(): array {
    $sql = "SELECT DISTINCT JSON_UNQUOTE(JSON_EXTRACT(platform, '$.slug')) AS slug, platform 
            FROM games 
            WHERE platform IS NOT NULL";

    $stmt = $this->pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $platforms = [];

    foreach ($rows as $row) {
      $platformData = json_decode($row['platform'], true);

      if ($platformData && isset($platformData['name'])) {
        $platform = $this->createPlatformFromJson($platformData);
        $platforms[] = $platform;
      }
    }

    return $platforms;
  }

  /**
   * @param string $slug
   * @return Game[]
   * @throws Exception
   */
  public function getPlatformBySlug(string $slug): array {
    $sql = <<< 'SQL'
        SELECT 
            id,
            code,
            name,
            slug,
            summary,
            release_date,
            price,
            platform,
            cover_url
        FROM games
        WHERE JSON_UNQUOTE(JSON_EXTRACT(platform, '$.slug')) = :slug;
    SQL;

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['slug' => $slug]);
    $data = $stmt->fetchAll();
    $gameList = [];
    foreach ($data as $gameData) {
      $gameList[] = $this->getGame($gameData);
    }
    return $gameList;
  }


  /**
   * @throws Exception
   */
  private function getGame(mixed $data): Game {
    if (!$data) {
      throw new Error('Game data is empty');
    }
    $platformData = json_decode($data['platform'], true);
    $platform = $this->createPlatformFromJson($platformData);
    return new Game(
      $data['code'],
      $data['name'],
      $data['slug'],
      $data['summary'],
      new \DateTime($data['release_date']),
      $data['price'],
      $platform,
      $data['cover_url'],
    );
  }

  private function createPlatformFromJson(array $data): Platform {
    if (!$data) {
      throw new Error('Platform data is empty');
    }
    return new Platform(
      $data['name'],
      $data['platform_logo_url'],
      $data['url'],
      $data['slug']
    );
  }
}