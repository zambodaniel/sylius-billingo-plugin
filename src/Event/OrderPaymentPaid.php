<?php
declare(strict_types=1);

namespace ZamboDaniel\SyliusBillingoPlugin\Event;

final class OrderPaymentPaid
{
    private string $orderNumber;

    private \DateTimeInterface $date;

    public function __construct(string $orderNumber, \DateTimeInterface $date)
    {
        $this->orderNumber = $orderNumber;
        $this->date = clone $date;
    }

    public function orderNumber(): string
    {
        return $this->orderNumber;
    }

    public function date(): \DateTimeInterface
    {
        return clone $this->date;
    }
}