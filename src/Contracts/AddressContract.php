<?php

declare(strict_types=1);

namespace Cresh\Helpers\Contracts;

interface AddressContract
{
    public function generateAddress(object $data): array;
}