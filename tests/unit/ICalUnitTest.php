<?php

use Timegridio\ICalReader\ICalParser;

class ICalUnitTest extends PackageTestCase
{
    protected $parser;

    public function setUp()
    {
        parent::setUp();

        $this->parser = new ICalParser();

        $stub = $this->getStub();

        $this->parser->initString($stub);
    }

    /**
     * @test
     */
    public function it_provides_calendar_name()
    {
        $name = $this->parser->calendarName();

        $this->assertInternalType('string', $name);
        $this->assertEquals('Personal', $name);
    }

    /**
     * @test
     */
    public function it_provides_calendar_description()
    {
        $description = $this->parser->calendarDescription();

        $this->assertInternalType('string', $description);
        $this->assertEquals('Test Stub Calendar', $description);
    }

    /**
     * @test
     */
    public function it_provides_calendar_timezone()
    {
        $timezone = $this->parser->calendarTimezone();

        $this->assertInternalType('string', $timezone);
        $this->assertEquals('America/Argentina/Buenos_Aires', $timezone);
    }

    /**
     * @test
     */
    public function it_parses_ical_file_into_an_events_array()
    {
        $events = $this->parser->events();

        $this->assertInternalType('array', $events);
        $this->assertCount(1576, $events);
        $this->assertTrue($this->parser->hasEvents());
    }

    /**
     * @test
     */
    public function it_validates_event_integrity()
    {
        $events = $this->parser->events();

        $event = $events[0];

        $testEvent = $this->getProcessedStub(0);

        $this->assertEquals($event, $testEvent);

        $event = $events[10];

        $testEvent = $this->getProcessedStub(10);

        $this->assertEquals($event, $testEvent);

        $event = $events[20];

        $testEvent = $this->getProcessedStub(20);

        $this->assertEquals($event, $testEvent);
    }

    protected function getStub()
    {
        return file_get_contents(__DIR__.'/stubs/ical-stub.ics');
    }

    protected function getProcessedStub($id)
    {
        $stubs = [
            0  => 'a:14:{s:13:"DTSTART_array";a:2:{i:0;a:0:{}i:1;s:16:"20160705T180000Z";}s:7:"DTSTART";s:16:"20160705T180000Z";s:11:"DTEND_array";a:2:{i:0;a:0:{}i:1;s:16:"20160705T183000Z";}s:5:"DTEND";s:16:"20160705T183000Z";s:13:"DTSTAMP_array";a:2:{i:0;a:0:{}i:1;s:16:"20160705T233549Z";}s:7:"DTSTAMP";s:16:"20160705T233549Z";s:9:"UID_array";a:2:{i:0;a:0:{}i:1;s:37:"07huqa398gu7i4sta2b12m0fvg@google.com";}s:3:"UID";s:37:"07huqa398gu7i4sta2b12m0fvg@google.com";s:14:"ATTENDEE_array";a:2:{i:0;a:1:{s:12:"X-NUM-GUESTS";s:1:"0";}i:1;s:24:"mailto:alariva@gmail.com";}s:8:"ATTENDEE";s:24:"mailto:alariva@gmail.com";s:19:"RECURRENCE-ID_array";a:2:{i:0;a:0:{}i:1;s:16:"20160705T160000Z";}s:13:"RECURRENCE-ID";s:16:"20160705T160000Z";s:13:"SUMMARY_array";a:2:{i:0;a:0:{}i:1;s:4:"Busy";}s:7:"SUMMARY";s:4:"Busy";}',
            10 => 'a:12:{s:13:"DTSTART_array";a:2:{i:0;a:0:{}i:1;s:16:"20160702T173000Z";}s:7:"DTSTART";s:16:"20160702T173000Z";s:11:"DTEND_array";a:2:{i:0;a:0:{}i:1;s:16:"20160702T183000Z";}s:5:"DTEND";s:16:"20160702T183000Z";s:13:"DTSTAMP_array";a:2:{i:0;a:0:{}i:1;s:16:"20160705T233549Z";}s:7:"DTSTAMP";s:16:"20160705T233549Z";s:9:"UID_array";a:2:{i:0;a:0:{}i:1;s:37:"d2llh1lg3ke9b04ic4eaoqp4jk@google.com";}s:3:"UID";s:37:"d2llh1lg3ke9b04ic4eaoqp4jk@google.com";s:14:"ATTENDEE_array";a:2:{i:0;a:1:{s:12:"X-NUM-GUESTS";s:1:"0";}i:1;s:24:"mailto:alariva@gmail.com";}s:8:"ATTENDEE";s:24:"mailto:alariva@gmail.com";s:13:"SUMMARY_array";a:2:{i:0;a:0:{}i:1;s:4:"Busy";}s:7:"SUMMARY";s:4:"Busy";}',
            20 => 'a:14:{s:13:"DTSTART_array";a:2:{i:0;a:0:{}i:1;s:16:"20160701T020000Z";}s:7:"DTSTART";s:16:"20160701T020000Z";s:11:"DTEND_array";a:2:{i:0;a:0:{}i:1;s:16:"20160701T023000Z";}s:5:"DTEND";s:16:"20160701T023000Z";s:13:"DTSTAMP_array";a:2:{i:0;a:0:{}i:1;s:16:"20160705T233549Z";}s:7:"DTSTAMP";s:16:"20160705T233549Z";s:9:"UID_array";a:2:{i:0;a:0:{}i:1;s:37:"vsq325sejn9o4psgv3mdas9i5c@google.com";}s:3:"UID";s:37:"vsq325sejn9o4psgv3mdas9i5c@google.com";s:14:"ATTENDEE_array";a:2:{i:0;a:1:{s:12:"X-NUM-GUESTS";s:1:"0";}i:1;s:24:"mailto:alariva@gmail.com";}s:8:"ATTENDEE";s:24:"mailto:alariva@gmail.com";s:19:"RECURRENCE-ID_array";a:2:{i:0;a:0:{}i:1;s:16:"20160701T003000Z";}s:13:"RECURRENCE-ID";s:16:"20160701T003000Z";s:13:"SUMMARY_array";a:2:{i:0;a:0:{}i:1;s:4:"Busy";}s:7:"SUMMARY";s:4:"Busy";}',
        ];

        return unserialize($stubs[$id]);
    }
}
