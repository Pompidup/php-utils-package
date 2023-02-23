<?php

declare(strict_types=1);

namespace Cresh\Helpers\Address;

use Cresh\Helpers\Contracts\AddressContract;
use Cresh\Helpers\Address\MagentoAddressStrategy;
use Cresh\Helpers\Contracts\AddressStrategyContract;
use Cresh\Helpers\Contracts\MagentoAddressContract;
use Exception;

class Address implements AddressContract
{
    /**
     * @var AddressStrategyContract
     */
    private $strategy;

    public function __construct(string $strategy)
    {
        switch ($strategy) {
            case 'magento':
                $this->strategy = new MagentoAddressStrategy();
                break;
            default:
                throw new Exception('Strategy not found');
        }
    }

    /**
     * @param MagentoAddressContract|object $data
     */
    public function generateAddress($data): array
    {
        return $this->strategy->generateAddress($data);
    }
}
