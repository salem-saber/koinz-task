<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReadingIntervalInsertedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $user_id;
    public $book_id;

    public function __construct($user_id, $book_id)
    {
        $this->user_id = $user_id;
        $this->book_id = $book_id;
    }

}
