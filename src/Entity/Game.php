<?php

namespace App\Entity;

use DateTime;
use JsonSerializable;

class Game implements JsonSerializable {

  private int $code;
  private string $name;
  private string $slug;
  private ?string $summary;
  private DateTime $release_date;
  private int $price;
  private Platform $platform;
  private ?string $cover_url;

  /**
   * @param int $code
   * @param string $name
   * @param string $slug
   * @param string|null $summary
   * @param DateTime $release_date
   * @param int $price
   * @param Platform $platform
   * @param ?string $cover_url
   */
  public function __construct(
    int      $code,
    string   $name,
    string   $slug,
    ?string  $summary,
    DateTime $release_date,
    int      $price,
    Platform $platform,
    ?string   $cover_url,
  ) {
    $this->code = $code;
    $this->name = $name;
    $this->slug = $slug;
    $this->summary = $summary;
    $this->release_date = $release_date;
    $this->price = $price;
    $this->platform = $platform;
    $this->cover_url = $cover_url;
  }

  public function getCode(): int {
    return $this->code;
  }

  public function getName(): string {
    return $this->name;
  }

  public function setCode(int $code): void {
    $this->code = $code;
  }

  public function setName(string $name): void {
    $this->name = $name;
  }

  public function setSlug(string $slug): void {
    $this->slug = $slug;
  }

  public function setSummary(?string $summary): void {
    $this->summary = $summary;
  }

  public function setReleaseDate(DateTime $release_date): void {
    $this->release_date = $release_date;
  }

  public function setPrice(int $price): void {
    $this->price = $price;
  }

  public function setPlatform(Platform $platform): void {
    $this->platform = $platform;
  }

  public function setCoverUrl(string $cover_url): void {
    $this->cover_url = $cover_url;
  }

  public function getSlug(): string {
    return $this->slug;
  }

  public function getSummary(): ?string {
    return $this->summary;
  }

  public function getReleaseDate(): DateTime {
    return $this->release_date;
  }

  public function getPrice(): int {
    return $this->price;
  }

  public function getPlatform(): Platform {
    return $this->platform;
  }

  public function getCoverUrl(): string {
    return $this->cover_url;
  }

  public function jsonSerialize(): array {
    return [
      'code' => $this->code,
      'name' => $this->name,
      'slug' => $this->slug,
      'summary' => $this->summary,
      'release_date' => $this->release_date,
      'price' => $this->price,
      'platform' => $this->platform->jsonSerialize(),
      'cover_url' => $this->cover_url,
    ];
  }
}