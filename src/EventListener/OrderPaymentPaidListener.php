<?php

declare(strict_types=1);

namespace ZamboDaniel\SyliusBillingoPlugin\EventListener;

use Symfony\Component\Messenger\MessageBusInterface;
use ZamboDaniel\SyliusBillingoPlugin\Event\OrderPaymentPaid;

final class OrderPaymentPaidListener
{
    private MessageBusInterface $commandBus;

    public function __construct(MessageBusInterface $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function __invoke(OrderPaymentPaid $event): void
    {
        //$this->commandBus->dispatch(new SendInvoiceEmail($event->orderNumber()));
    }
}