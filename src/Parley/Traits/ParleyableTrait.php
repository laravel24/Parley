<?php

namespace Parley\Traits;

use ReflectionClass;
use Parley\Models\Thread;

trait ParleyableTrait
{
    public function notify($action, $thread)
    {
        $class = get_class($this);

        $event = 'parley.' . $action . '.for.' . str_replace('\\', '.', $class);

        // Fire a notification event.
        \Event::fire($event, [
            'action' => $action,
            'thread' => $thread,
            'member' => $this
        ]);
    }
}