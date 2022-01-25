<?php

declare(strict_types=1);

namespace ZamboDaniel\SyliusBillingoPlugin\Creator;

interface InvoiceCreatorInterface
{
    public function __invoke(string $orderNumber, \DateTimeInterface $dateTime): void;
}