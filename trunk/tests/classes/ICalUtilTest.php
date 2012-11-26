<?php
ini_set('include_path', ini_get('include_path')
        . PATH_SEPARATOR
        . './'
        . PATH_SEPARATOR
        . '../'
        . PATH_SEPARATOR
        . '../../'
        . PATH_SEPARATOR
);

require_once 'classes/iCalUtil.php';
/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-11-25 at 20:48:33.
 */
class ICalUtilTest extends PHPUnit_Framework_TestCase {

    /**
     * @var ICalUtil
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new ICalUtil;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers ICalUtil::ical_split
     * @todo   Implement testIcal_split().
     */
    public function testIcal_split() {
        $expected = "This is a really long title with several lines of text in it that w\n\t"
                    . "ill get turned into a formatted text value for the iCalendar. Now is the t\n\t"
                    . "ime for all good men to come to the aid of their country men for it is not\n\t"
                    . " in the interest of self or of selfishness but in the spirit of the times \n\t"
                    . "that we say ask not what your country can do for you\\, ask what you can do\n\t"
                    . " for your country.";
        $this->assertEquals($expected, $this->object->ical_split("SUMMARY:" 
                , "This is a really long title with several lines of text in it 
                    that will get turned into a formatted text value for the  iCalendar. 
                    Now is the time for all good men to come to the aid of their country men 
                    for it is not in the interest of self or of selfishness but in the 
                    spirit of the times that we say ask not what your country can 
                    do for you, ask what you can do for your country."));
       
    }

    /**
     * @covers ICalUtil::write_item
     * @todo   Implement testWrite_item().
     */
    public function testWrite_item() {
        $expected = "SUMMARY:This is a really long title with several lines of text in it that w\n\t"
                    . "ill get turned into a formatted text value for the iCalendar. Now is the t\n\t"
                    . "ime for all good men to come to the aid of their country men for it is not\n\t"
                    . " in the interest of self or of selfishness but in the spirit of the times \n\t"
                    . "that we say ask not what your country can do for you\\, ask what you can do\n\t"
                    . " for your country.";
        $this->assertEquals($expected, $this->object->write_item("SUMMARY:" 
                , "This is a really long title with several lines of text in it 
                    that will get turned into a formatted text value for the  iCalendar. 
                    Now is the time for all good men to come to the aid of their country men 
                    for it is not in the interest of self or of selfishness but in the 
                    spirit of the times that we say ask not what your country can 
                    do for you, ask what you can do for your country."));
        
    }

    /**
     * @covers ICalUtil::encode_ical
     * @todo   Implement testEncode_ical().
     */
    public function testEncode_ical() {
        // Escaped characters
        //ESCAPED-CHAR => "\\" / "\;" / "\," / "\N" / "\n")
        //  \N or \n    encodes newline
        $this->assertEquals('', $this->object->encode_ical("\n\n\n\n\n"));
       
        $this->assertEquals('', $this->object->encode_ical('    '));
        
        $this->assertEquals('\\\\', $this->object->encode_ical("\\"));
       
        $this->assertEquals('\\;', $this->object->encode_ical(';'));
        
        $this->assertEquals('\\,', $this->object->encode_ical(','));
        
    }

}