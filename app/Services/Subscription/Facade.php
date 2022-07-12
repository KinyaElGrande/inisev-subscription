<?php
declare(strict_types=1);

namespace App\Services\Subscription;

use \Illuminate\Support\Facades\Facade as BaseFacade;

class Facade extends BaseFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'subscriptionService';
    }
}
