<?php

declare(strict_types=1);

namespace App\Infrastructure\TelegramBot\DTO;

class SetWebhookRequestDTO extends RequestDTO
{
    public function __construct(
        private string $url,
        private string $secretToken
    ) {
    }

    public function toArray(): array
    {
        return [
            'url' => $this->url,
            'secret_token' => $this->secretToken,
        ];
    }
}
