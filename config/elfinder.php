<?php

return array(
  'dir' => ['storage'],
  'disks' => ['public'],
  'route' => [
    'prefix' => 'elfinder',
    'middleware' => array('web', 'auth'),
  ],
  'access' => 'Barryvdh\Elfinder\Elfinder::checkAccess',
  'roots' => null,
  'options' => array(),
  'root_options' => array(),
);
