<?php

namespace App\Command;

use PDO;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:import-games')]
class ImportGamesCommand extends Command
{
  protected function execute(InputInterface $input, OutputInterface $output): int
  {
    $jsonPath = __DIR__ . '/../asset/games.json';

    if (!file_exists($jsonPath)) {
      $output->writeln('<error>games.json introuvable</error>');
      return Command::FAILURE;
    }

    $json = file_get_contents($jsonPath);
    $games = json_decode($json, true);

    if ($games === null) {
      $output->writeln('<error>Erreur de parsing JSON</error>');
      return Command::FAILURE;
    }

    $pdo = new PDO('mysql:host=127.0.0.1;dbname=game_catalog;charset=utf8mb4', 'symfony', 'motdepassefort');

    $stmt = $pdo->prepare("
            INSERT INTO games (code, name, slug, summary, release_date, price, platform, cover_url)
            VALUES (:code, :name, :slug, :summary, :release_date, :price, :platform, :cover_url)
        ");

    foreach ($games as $game) {
      $coverUrl = isset($game['cover']['url']) ? 'https:' . $game['cover']['url'] : null;
      $platformJson = isset($game['platform']) ? json_encode($game['platform']) : null;

      $stmt->execute([
        'code' => $game['code'] ?? null,
        'name' => $game['name'] ?? '',
        'slug' => $game['slug'] ?? '',
        'summary' => $game['summary'] ?? '',
        'release_date' => isset($game['first_release_date']) ? date('Y-m-d H:i:s', $game['first_release_date']) : null,
        'price' => $game['price'] ?? 0,
        'platform' => $platformJson,
        'cover_url' => $coverUrl,
      ]);
    }

    $output->writeln('<info>Import terminé !</info>');

    return Command::SUCCESS;
  }
}
