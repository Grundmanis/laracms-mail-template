<?php

namespace Grundmanis\Laracms\Modules\MailTemplate\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailTemplate extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $text;

    /**
     * Create a new message instance.
     *
     * @param string $text
     * @param string $subject
     */
    public function __construct(string $text, string $subject)
    {
        $this->text = $text;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject($this->subject)
            ->view('laracms.newsletter::mails.newsletter');
    }
}
