<?php


namespace Imdhemy\Purchases\ServerNotifications;

use GuzzleHttp\Exception\GuzzleException;
use Imdhemy\AppStore\ServerNotifications\ServerNotification;
use Imdhemy\GooglePlay\DeveloperNotifications\DeveloperNotification;
use Imdhemy\Purchases\Contracts\ServerNotificationContract;
use Imdhemy\Purchases\Contracts\SubscriptionContract;
use Imdhemy\Purchases\Subscriptions\GoogleSubscription;

/**
 * Class GoogleServerNotification
 * @package Imdhemy\Purchases\ServerNotifications
 */
class GoogleServerNotification implements ServerNotificationContract
{
    const TESTING_NOTIFICATION = -1;

    /**
     * @var DeveloperNotification
     */
    private $notification;

    /**
     * GoogleServerNotification constructor.
     * @param DeveloperNotification $notification
     */
    public function __construct(DeveloperNotification $notification)
    {
        $this->notification = $notification;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        $type = $this->isTest() ?
            self::TESTING_NOTIFICATION :
            $this->notification->getSubscriptionNotification()->getNotificationType();

        return (string)$type;
    }

    /**
     * @return SubscriptionContract
     * @throws GuzzleException
     */
    public function getSubscription(): SubscriptionContract
    {
        return GoogleSubscription::createFromDeveloperNotification($this->notification);
    }

    /**
     * @return bool
     */
    public function isTest(): bool
    {
        return $this->notification->isTestNotification();
    }

    public function getNotification(): ServerNotification
    {
    }
}
