<?php

declare(strict_types=1);

namespace ZamboDaniel\SyliusBillingoPlugin\EventProducer;

use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Model\PaymentInterface;
use ZamboDaniel\SyliusBillingoPlugin\DateTimeProvider;
use ZamboDaniel\SyliusBillingoPlugin\Event\OrderPaymentPaid;
use Symfony\Component\Messenger\MessageBusInterface;
use Webmozart\Assert\Assert;

final class OrderPaymentPaidProducer
{
    private MessageBusInterface $eventBus;

    private DateTimeProvider $dateTimeProvider;

    /**
     * @param MessageBusInterface $eventBus
     * @param DateTimeProvider $dateTimeProvider
     */
    public function __construct(
        MessageBusInterface $eventBus,
        DateTimeProvider $dateTimeProvider
    ) {
        $this->eventBus = $eventBus;
        $this->dateTimeProvider = $dateTimeProvider;
    }

    public function __invoke(PaymentInterface $payment): void
    {
        if (!$this->shouldEventBeDispatched($payment)) {
            return;
        }

        $order = $payment->getOrder();

        Assert::notNull($order);

        $this->eventBus->dispatch(new OrderPaymentPaid(
            $order->getNumber(),
            $this->dateTimeProvider->__invoke()
        ));
    }

    private function shouldEventBeDispatched(PaymentInterface $payment): bool
    {
        /** @var OrderInterface $order */
        $order = $payment->getOrder();

        return null !== $order;
    }
}