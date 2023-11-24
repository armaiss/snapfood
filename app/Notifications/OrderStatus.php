<?php

namespace App\Notifications;

use App\Models\Cart as Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderStatus extends Notification implements ShouldQueue
{
    use Queueable;

    protected Order $order;

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $status = $this->order->status;
        $subject = 'وضعیت سفارش شما به‌روزرسانی شد';

        // Use a match statement to determine the view based on the order status
        switch ($status) {
            case 'در حال بررسی':
                $view = 'emails.orderPending';
                break;
            case 'در حال تهیه':
                $view = 'emails.orderPreparing';
                break;
            case 'در حال ارسال':
                $view = 'emails.orderSending';
                break;
            case 'تحویل گرفته شد':
                $view = 'emails.orderDelivered';
                break;
            default:
                $view = 'emails.order-Pending';
                break;
        }

        return (new MailMessage)->view($view)->subject($subject);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
