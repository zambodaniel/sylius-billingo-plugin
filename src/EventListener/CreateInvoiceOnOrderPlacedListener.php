<?php

declare(strict_types=1);

namespace ZamboDaniel\SyliusBillingoPlugin\EventListener;

use ZamboDaniel\SyliusBillingoPlugin\Creator\InvoiceCreatorInterface;
use ZamboDaniel\SyliusBillingoPlugin\Event\OrderPlaced;

final class CreateInvoiceOnOrderPlacedListener
{
    private InvoiceCreatorInterface $invoiceCreator;

    public function __construct(InvoiceCreatorInterface $invoiceCreator)
    {
        $this->invoiceCreator = $invoiceCreator;
    }

    public function __invoke(OrderPlaced $event): void
    {
        try {
            $this->invoiceCreator->__invoke($event->orderNumber(), $event->date());
        } catch (InvoiceAlreadyGenerated $exception) {
            return;
        }
    }
}