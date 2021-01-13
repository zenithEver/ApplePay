<?php


namespace Imdhemy\Purchases\Contracts;

use Imdhemy\AppStore\ServerNotifications\ServerNotification;

/**
 * Interface ServerNotificationContract
 * @package Imdhemy\Purchases\Events\Contracts
 */
interface ServerNotificationContract
{
    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return SubscriptionContract
     */
    public function getSubscription(): SubscriptionContract;

    /**
     * @return bool
     */
    public function isTest(): bool;

    /**
     * 获取服务器通知
     * @return ServerNotification
     */
    public function getNotification(): ServerNotification;
}
