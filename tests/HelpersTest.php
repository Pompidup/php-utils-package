<?php

use Cresh\Helpers\Contracts\MagentoAddressContract;
use Cresh\Helpers\Helpers;

class FakeMagentoAddress implements MagentoAddressContract {
    public function getFirstname(): string
    {
        return 'John';
    }

    public function getLastname(): string
    {
        return 'Doe';
    }

    public function getTelephone(): string
    {
        return '0612345678';
    }

    public function getEmail(): string
    {
        return 'john@doe.com';
    }

    public function getStreet(): array
    {
        return ['12 rue de la paix'];
    }

    public function getPostcode(): string
    {
        return '75000';
    }

    public function getCity(): string
    {
        return 'Paris';
    }

    public function getCountryId(): string
    {
        return 'FR';
    }
}

it('should create a new instance of Helpers', function () {
    // Act
    $helpers = new Helpers('magento');

    // Assert
    expect($helpers)->toBeInstanceOf(Helpers::class);
});


it('should format an address', function () {
    // Arrange
    $fakeMagentoAddress = new FakeMagentoAddress();

    // Act
    $helpers = new Helpers('magento');
    $formatted =  $helpers->formatAddress($fakeMagentoAddress);

    // Assert
    expect($formatted)->toBe([
        'firstname' => 'John',
        'lastname' => 'Doe',
        'phone' => '0612345678',
        'email' => 'john@doe.com',
        'address_line1' => '12 rue de la paix',
        'zipcode' => '75000',
        'city' => 'Paris',
        'country' => 'FRA',
    ]);
});

it('should generate a seal', function () {
    // Arrange
    $payload = 'payload';
    $secret = 'secret';

    // Act
    $helpers = new Helpers('magento');
    $seal = $helpers->generateSeal($payload, $secret);

    // Assert
    expect($seal)->toBe('9c029f9c34c77869c4b53917dfad5e018de9c3216b7947fe808ae2db8d139d3732dc88cc24af229aff073f935033f2f91f0cead3c9f83534e9dbe9b89d26fffa');
});
