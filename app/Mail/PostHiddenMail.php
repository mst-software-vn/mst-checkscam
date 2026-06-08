<?php

namespace App\Mail;

use App\Models\NewfeedPost;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PostHiddenMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public NewfeedPost $post) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Bài đăng của bạn đã bị ẩn trên Khu Mua Bán',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.post-hidden',
        );
    }
}
