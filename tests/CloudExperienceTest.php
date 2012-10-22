<?php
include sprintf('%s/%s', dirname(dirname(__FILE__)), 'CloudExperience.php');

class CloudExperienceTest extends PHPUnit_Framework_TestCase
{
  private $cx;

  public function setup()
  {
    $this->cx = new CloudExperience(null, null);
  }

  public function testSetAccessTokenSuccess()
  {
    $res = $this->cx->setAccessToken('1234');
    $this->assertTrue($res);
  }

  public function testSetAccessTokenFailure()
  {
    $res = $this->cx->setAccessToken(null);
    $this->assertFalse($res);

    $res = $this->cx->setAccessToken(0);
    $this->assertFalse($res);

    $res = $this->cx->setAccessToken('');
    $this->assertFalse($res);

    $res = $this->cx->setAccessToken(false);
    $this->assertFalse($res);
  }
}
