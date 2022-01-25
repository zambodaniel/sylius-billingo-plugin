<?php

declare(strict_types=1);

namespace ZamboDaniel\SyliusBillingoPlugin\Creator;

use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Repository\OrderRepositoryInterface;

final class InvoiceCreator implements InvoiceCreatorInterface
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function __invoke(string $orderNumber, \DateTimeInterface $dateTime): void
    {
        /** @var OrderInterface $order */
        $order = $this->orderRepository->findOneByNumber($orderNumber);

        //if (null !== $invoice) {
        //    throw InvoiceAlreadyGenerated::withOrderNumber($orderNumber);
        //}
        //TODO API CALL
    }
}