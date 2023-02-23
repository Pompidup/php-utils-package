<?php

declare(strict_types=1);

namespace Cresh\Helpers\Address;

use Cresh\Helpers\Contracts\AddressStrategyContract;
use Cresh\Helpers\Contracts\MagentoAddressContract;

class MagentoAddressStrategy extends AddressStrategy implements AddressStrategyContract
{
    /**
     * @param MagentoAddressContract $address
     */
    public function generateAddress($address): array
    {
        $object = [
            'firstname' => $address->getFirstname(),
            'lastname' => $address->getLastname(),
            'phone' => $address->getTelephone(),
            'email' => $address->getEmail(),
            'address_line1' => $address->getStreet()[0],
            'zipcode' => $address->getPostcode(),
            'city' => $address->getCity(),
            'country' => $this->convertCountryIdToAlpha3($address->getCountryId()),
        ];
        if (count($address->getStreet()) >= 2) {
            $object['address_line2'] = $address->getStreet()[1];
        }
        return $object;
    }
}