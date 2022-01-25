<?php

declare(strict_types=1);

namespace ZamboDaniel\SyliusBillingoPlugin;

interface DateTimeProvider
{
    public function __invoke(): \DateTimeInterface;
}