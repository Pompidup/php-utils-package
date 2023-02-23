<?php

declare(strict_types=1);

namespace Cresh\Helpers\Contracts;


interface MagentoAddressContract {
    public function getFirstname(): string;
    public function getLastname(): string;
    public function getTelephone(): string;
    public function getEmail(): string;
    public function getStreet(): array;
    public function getPostcode(): string;
    public function getCity(): string;
    public function getCountryId(): string;
}