<?php

namespace App\Mail;

use App\Models\Cart as Order ;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class OrderStatusMail extends Mailable
{
    use SerializesModels;

    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        $status = $this->order->status;
        $subject = 'وضعیت سفارش شما به‌روزرسانی شد';

        return match ($status) {
            'در حال بررسی' => $this->view('emails.orderPending')->subject($subject),
            'در حال تهیه' => $this->view('emails.orderPreparing')->subject($subject),
            'در حال ارسال' => $this->view('emails.orderSending')->subject($subject),
            'تحویل گرفته شد' => $this->view('emails.orderDelivered')->subject($subject),
            default => $this->view('emails.order-Pending')->subject($subject),
        };
    }
}
