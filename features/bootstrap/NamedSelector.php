<?php

class NamedSelector
{
  protected $elements = array(
    'ceo_section' => ".//*[@id='team']/div[1]/div[1]/span[1]",
    'art_director_section' => ".//*[@id='team']/div[1]/div[2]/span[1]",
    'sr_software_dev' => ".//*[@id='team']/div[1]/div[3]/span[1]",
    'mobile_link' => "//div[1]/div[1]/ul/li[5]/a",
    'porto_socialplay' => ".//*[@id='mobile']/div[1]/h2"
  );

  public function get($key) 
  {
    return $this->elements[$key];
  }
}
