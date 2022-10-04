<?php
declare(strict_types=1);

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__);

return (new PhpCsFixer\Config())
    ->setRules(['@Symfony' => true])
    ->setFinder($finder);
