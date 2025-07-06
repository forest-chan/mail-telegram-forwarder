<?php

declare(strict_types=1);

namespace App\Application\Service\TelegramBot\Command;

use App\Application\Service\TelegramBot\Enum\TelegramBot;
use App\Application\Service\TelegramBot\Registry\TelegramBotClientRegistry;
use App\Infrastructure\TelegramBot\Client\TelegramBotClientInterface;
use Telegram\Bot\Commands\Command;

abstract class AbstractTelegramBotCommand extends Command
{
    private TelegramBotClientRegistry $telegramBotClientRegistry;

    public function setRegistry(TelegramBotClientRegistry $telegramBotClientRegistry): void
    {
        $this->telegramBotClientRegistry = $telegramBotClientRegistry;
    }

    protected function getTelegramBotClient(TelegramBot $telegramBot): TelegramBotClientInterface
    {
        return $this->telegramBotClientRegistry->getTelegramBotClient($telegramBot);
    }

    protected function getChatId(): int
    {
        $chatId = $this->getUpdate()->getChat()->id ?? null;

        if ($chatId === null) {
            throw new \LogicException();
        }

        return $chatId;
    }
}
