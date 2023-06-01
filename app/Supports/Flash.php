<?php
declare(strict_types=1);

namespace App\Supports;

use Illuminate\Contracts\Session\Session;

use App\Supports\FlashMessage;

class Flash
{
    public const MESSAGE_KEY = 'shop_flash_message';
    public const MESSAGE_CLASS = 'shop_flash_class';
    public function __construct(protected Session $session)
    {

    }

    public function info(string $message)
    {
        session()->flash(self::MESSAGE_KEY, $message);
        session()->flash(self::MESSAGE_CLASS, 'font-regular relative mb-4 block w-full rounded-lg bg-blue-500 p-4 text-base leading-5 text-white opacity-100');
    }

    public function warning(string $message)
    {
        session()->flash(self::MESSAGE_KEY, $message);
        session()->flash(self::MESSAGE_CLASS, 'font-regular relative mb-4 block w-full rounded-lg bg-red-500 p-4 text-base leading-5 text-white opacity-100');
    }

    public function get():?FlashMessage
    {
        $message = $this->session->get(self::MESSAGE_KEY);
        if ($message!== null)
        {
            return new FlashMessage($message,$this->session->get(self::MESSAGE_CLASS));
        }return  null;
    }
}
