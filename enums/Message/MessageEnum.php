<?php

namespace app\enums\Message;

class MessageEnum
{
    const NEW_MESSAGE = 'new message';
    const SUCCESS_SEND = 'success send';

    public static function getLogCategory(string $type): string
    {
        switch ($type) {
            case self::NEW_MESSAGE:
                return 'Clients';
            case self::SUCCESS_SEND:
                return 'Operators';
        }

        return 'Default';
    }
}