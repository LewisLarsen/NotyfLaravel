<?php

namespace LewisLarsen\Notyf\Http\Helpers;

use Exception;

class Notyf
{
    /**
     * Create a Notyf notification for the authenticated user.
     *
     * @param string $type The following values are allowed by default: success, warning, error, info. This can be modified in the config.
     * @param string $text The text for a notification, accepts translation string if enabled in config.
     * @param bool|null $dismissable Whether the notification can be dismissed, default is false, can be changed in config.
     * @param string|null $y_position Set the x position of the notification. The following values are allowed: top, center, bottom.
     * @param string|null $x_position Set the x position of the notification. The following values are allowed: left, center, right.
     * @param int|null $duration Enter a duration for the notification, default value in config is used if empty.
     * @return self
     * @throws Exception
     */
    public static function create(
        string $type,
        string $text,
        bool $dismissable = null,
        string $y_position = null,
        string $x_position = null,
        int $duration = null
    )
    {
        // check to see if we're using translation strings here.
        if (config('notyf.use_translation_strings', false))
        {
            $message = trans($text);
        } else
        {
            $message = $text;
        }

        $notificationTypes = config('notyf.types', array('success', 'error', 'warning', 'info'));

        // hardcoded values as per https://github.com/caroso1222/notyf#inotyfposition
        $yPositionTypes = ['top', 'center', 'bottom'];
        $xPositionTypes = ['left', 'center', 'right'];

        // check if values are set.

        if (is_null($dismissable))
        {
            $dismissable = config('notyf.default_dismissable_state', false);
        }

        if (is_null($duration))
        {
            $duration = config('notyf.default_duration', '2600');
        }

        if (is_null($x_position))
        {
            $x_position = config('notyf.default_x_position', 'left');
        }

        if (is_null($y_position))
        {
            $y_position = config('notyf.default_y_position', 'top');
        }

        // throw exception if incorrect values are entered.

        if (!in_array($type, $notificationTypes))
        {
            throw new Exception('Notification type does not exist.', 403);
        }

        if (!in_array($x_position, $xPositionTypes))
        {
            throw new Exception('Position type for X does not exist.', 403);
        }

        if (!in_array($y_position, $yPositionTypes))
        {
            throw new Exception('Position type for Y does not exist.', 403);
        }

        if (!is_bool($dismissable))
        {
            throw new Exception('Boolean value is only accepted for whether the notification can be dismissed or not.',
                403);
        }

        // convert the dismissable variable so the JS behaves.
        if ($dismissable == false)
        {
            $dismissable = '0';
        }

        return session()->flash('notyf', [$type, $message, $dismissable, $y_position, $x_position, $duration]);
    }
}
