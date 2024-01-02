<?php

namespace App\Twig\Components;

use App\Repository\CategoryRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class NavBar
{
  /**
   * @var Category[]
   */

  public array $categories=[];

  public function __construct(private CategoryRepository $categoryRepository)
  {
  }

  public function mount(): void
  {
    $this->categories = $this->categoryRepository->findAll();
  }
}
