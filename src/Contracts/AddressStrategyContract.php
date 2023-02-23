<?php

declare(strict_types=1);

namespace Cresh\Helpers\Contracts;

interface AddressStrategyContract
{
    /**
     * @param MagentoAddressContract|object $address
     */
    public function generateAddress($address): array;
}