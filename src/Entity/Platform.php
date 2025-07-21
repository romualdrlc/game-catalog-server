<?php

namespace App\Entity;

class Platform implements \JsonSerializable {
  private string $name;
  private string $platformLogoUrl;
  private string $url;
  private string $slug;

  public function __construct(string $name, string $platformLogoUrl, string $url, string $slug) {
    $this->name = $name;
    $this->platformLogoUrl = $platformLogoUrl;
    $this->url = $url;
    $this->slug = $slug;
  }

  public function getName(): string {
    return $this->name;
  }

  public function getPlatformLogoUrl(): ?string {
    return $this->platformLogoUrl;
  }

  public function getUrl(): ?string {
    return $this->url;
  }

  public function getSlug(): ?string {
    return $this->slug;
  }

  public function jsonSerialize(): array {
    return [
      'name' => $this->name,
      'platform_logo_url' => $this->platformLogoUrl,
      'url' => $this->url,
      'slug' => $this->slug,
    ];
  }
}