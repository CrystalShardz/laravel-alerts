<?php

namespace Crystalshardz\LaravelAlerts;

use Illuminate\Http\Request;

class Alert
{
    protected $message = null;
    protected $level = null;

    /**
     * Alert constructor.
     * @param string $message Message for the alert
     * @param string $level Level of the alert (use bootstrap classes)
     */
    public function __construct()
    {
        $request = request();
        $alert = $request->session()->get('laravel-alert');
        if (!empty($alert)) {
            // an alert was set
            $this->message = $alert['message'];
            $this->level = $alert['level'];
        }
    }

    public function __get($what)
    {
        switch ($what) {
            case 'message':
                return $this->message;
                break;
            case 'level':
                return $this->level;
                break;
            default:
                return null;
                break;
        }
    }

    public function message()
    {
        return $this->message;
    }

    public function level()
    {
        return $this->level;
    }

    public function bsclass()
    {
        return 'alert-' . $this->level;
    }

    public function exists()
    {
        return !empty($this->message);
    }

    /**
     * Use this method to save the Alert for the current page load only
     * This will NOT be available accross page loads so don't redirect after
     * using this method!
     * @param string $message
     * @param string $level
     */
    public function flash($message = '', $level = '')
    {
        $this->message = $message;
        $this->level = $level;
    }

    /**
     * Use this method to save the Alert to the current session to
     * display it on the next page load.
     * @param string $message The message to display
     * @param string $level The level of the message (use bootstrap classes)
     */
    public function save($message = '', $level = '')
    {
        if (!empty($message)) {
            $this->message = $message;
        }
        if (!empty($level)) {
            $this->level = $level;
        }

        $alert = [
            'message' => $this->message,
            'level' => $this->level
        ];

        $request = request();
        $request->session()->flash('laravel-alert', $alert);
    }

    /**
     * Renew's the current method for the next page load
     */
    public function renew()
    {
        $this->save($this->message, $this->level);
    }
}