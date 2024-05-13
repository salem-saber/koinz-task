<?php

namespace App\Listeners;

use App\Models\Book;
use App\Models\User;
use App\Services\SMSService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendSMSListener
{
    private SMSService $smsService;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        $this->smsService = new SMSService();
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $userId = $event->user_id;
        $bookId = $event->book_id;

        $user = User::find($userId);
        $name = $user->name;
        $phone = $user->phone;

        $title = Book::find($bookId)->title;

        $message = str_replace(
            ['{name}', '{title}'],
            [$name, $phone, $title],
            "Dear {name}, Thank you for reading '{title}'. We hope you enjoyed it."
        );

        $this->smsService->sendSMS($phone, $message);

    }
}
