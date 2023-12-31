<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter
{
    public function __construct(protected ApiClient $client)
    {
        # code...
    }

    public function subscribe(string $email)
    {
        return $this->client->lists->addListMember(config('services.mailchimp.lists.subscribers'), [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }
}
