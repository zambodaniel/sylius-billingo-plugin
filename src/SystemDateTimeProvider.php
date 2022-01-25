<?php

declare(strict_types=1);

namespace ZamboDaniel\SyliusBillingoPlugin;

class SystemDateTimeProvider
{
    public function __invoke(): \DateTimeInterface
    {
        return new \DateTimeImmutable('now');
    }
}