<?php

use Timegridio\ICalReader\ICalEvents;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class ICalEventsUnitTest extends PackageTestCase
{
    /**
     * @var ICalEvents
     */
    protected $icalevents;

    public function setUp()
    {
        parent::setUp();

        $this->icalevents = new ICalEvents();

        $this->icalevents->loadString($this->getStub());
    }

    /**
     * @test
     */
    public function it_gets_events_from_string()
    {
        $events = $this->icalevents->get()->all();

        $this->assertInstanceOf(Collection::class, $events);
    }

    /**
     * @test
     */
    public function it_determines__if_busy_for_timeslot()
    {
        $busy = $this->icalevents->isBusy(Carbon::parse('2016-07-11 23:10')->timezone('America/Argentina/Buenos_Aires'));

        $this->assertTrue($busy);

        $busy = $this->icalevents->isBusy(Carbon::parse('2016-07-11 23:30')->timezone('America/Argentina/Buenos_Aires'));

        $this->assertFalse($busy);

        $busy = $this->icalevents->isBusy(Carbon::parse('2099-12-01 00:30')->timezone('America/Argentina/Buenos_Aires'));

        $this->assertFalse($busy);
    }

    protected function getStub()
    {
        $contents = file_get_contents(__DIR__.'/stubs/ical-stub.ics');

        return $contents;
    }
}
