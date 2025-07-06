<?php

declare(strict_types=1);

namespace App\Application\Service\TelegramBot\Command\MailTelegram;

use App\Application\Service\TelegramBot\Command\AbstractTelegramBotCommand;
use App\Application\Service\TelegramBot\Enum\TelegramBot;
use App\Infrastructure\TelegramBot\DTO\SendMessageRequestDTO;
use App\Infrastructure\TelegramBot\Enum\ParseMode;

class CreateMailTelegramCommand extends AbstractTelegramBotCommand
{
    protected string $name = "create";

    public function handle(): void
    {
        $telegramBotClient = $this->getTelegramBotClient(TelegramBot::MAIL_TELEGRAM_FORWARDER);

        $chatId = $this->getChatId();

        $telegramBotClient->sendMessage(new SendMessageRequestDTO(
            chatId: $chatId,
            text: "Привет! Твой уникальный идентификатор чата: $chatId",
            parseMode: ParseMode::HTML,
        ));
    }
}
