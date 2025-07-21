<?php

namespace App\Controller;

use App\Manager\GameManager;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GameApiController extends AbstractController {

  /**
   * @throws Exception
   */
  #[Route('/api/games', name: 'get_game_List', methods: ['GET'])]
  public function getGameList(GameManager $gameManager): JsonResponse {
    $gameList = $gameManager->getGameList();
    return $this->json($gameList);
  }

  /**
   * @throws Exception
   */
  #[Route('/api/games/{slug}', name: 'get_game_by_slug', methods: ['GET'])]
  public function getGameBySlug(string $slug, GameManager $gameManager): JsonResponse {
    $game = $gameManager->getGameBySlug($slug);
    return $this->json($game);
  }

  /**
   * @throws Exception
   */
  #[Route('/api/platforms', name: 'get_platform_list', methods: ['GET'])]
  public function getPlatformList(GameManager $gameManager): JsonResponse {
    $platformList = $gameManager->getPlatformList();
    return $this->json($platformList);
  }

  /**
   * @throws Exception
   */
  #[Route('/api/platform/{slug}', name: 'get_Game_list_by_platform', methods: ['GET'])]
  public function getGameListByPlatform(string $slug, GameManager $gameManager): JsonResponse {
    $gameList = $gameManager->getGameListByPlatform($slug);
    return $this->json($gameList);
  }
}
