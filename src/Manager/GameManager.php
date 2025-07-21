<?php

namespace App\Manager;

use App\Entity\Game;
use App\Repository\GameRepository;
use Exception;
use Symfony\Contracts\Service\Attribute\Required;

class GameManager {

  #[Required]
  public GameRepository $gameRepository;

  /**
   * @return Game[]
   * @throws Exception
   */
  public function getGameList(): array {
    return $this->gameRepository->getGameList();
  }

  /**
   * @throws Exception
   */
  public function getGameBySlug(string $slug): Game {
    return $this->gameRepository->getGameBySlug($slug);
  }

  /**
   * @return array<array{name: string, cover: string}>
   * @throws Exception
   */
  public function getPlatformList(): array {
    return $this->gameRepository->getPlatformList();
  }

  /**
   * @return Game[]
   * @throws Exception
   */
  public function getGameListByPlatform(string $slug): array {
    return $this->gameRepository->getPlatformBySlug($slug);
  }
}