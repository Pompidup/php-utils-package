<?php

declare(strict_types=1);

namespace Cresh\Helpers;

use Cresh\Helpers\Address\Address;
use Cresh\Helpers\Contracts\HelpersContract;
use Cresh\Helpers\Contracts\MagentoAddressContract;

class Helpers implements HelpersContract
{
     /**
     * @var string
     */
    static $algorithm = 'sha512';
     /**
     * @var Address
     */
    private $address;

    public function __construct(string $strategy)
    {
        $this->address = new Address($strategy);
    }

    /**
     * @param MagentoAddressContract|object $data
     */
    public function formatAddress($data): array
    {
        return $this->address->generateAddress($data);
    }

    public function generateSeal(string $payload, string $secret): string
    {
        $base64Encode = base64_encode(stripslashes($payload));
        $seal = hash_hmac(self::$algorithm, $base64Encode, $secret);
        return $seal;
    }
}


