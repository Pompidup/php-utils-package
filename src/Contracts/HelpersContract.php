<?php

declare(strict_types=1);

namespace Cresh\Helpers\Contracts;

interface HelpersContract
{
    public function __construct(string $strategy);
    public function formatAddress(object $data): array;
    public function generateSeal(string $payload, string $secret): string;
}