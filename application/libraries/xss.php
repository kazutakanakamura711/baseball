<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Xss
{
  function xssclean($s) {
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
    }
}