<?php

namespace Timegridio\ICalReader;

use Carbon\Carbon;

class ICalEvents
{
    private $parser = null;

    private $events = null;

    private $timezone;

    public function __construct()
    {
        $this->parser = new ICalParser();
    }

    public function loadUrl($url)
    {
        $this->parser->initUrl($url);

        return $this;
    }

    public function loadString($string)
    {
        $this->parser->initString($string);

        return $this;
    }

    public function get()
    {
        $events = $this->parser->events();

        $this->timezone = $this->parser->calendarTimezone();

        $this->events = $this->map($events);

        return $this;
    }

    protected function map($events)
    {
        $timezone = $this->timezone;

        return collect($events)->map(function ($event) use ($timezone) {
            return new ICalEvent($event, $timezone);
        });
    }

    public function all()
    {
        $this->autoload();

        return $this->events;
    }

    public function isBusy(Carbon $atDatetime)
    {
        $this->autoload();

        $filtered = $this->events->filter(function ($event) use ($atDatetime) {
            return $event->holds($atDatetime);
        });

        if (count($filtered) == 1) {
            return $filtered->first()->isBusy();
        }

        return false;
    }

    protected function autoload()
    {
        if ($this->events === null) {
            $this->get();
        }
    }
}
