<?php

$container->loadFromExtension('swiftmailer', [
    'transport' => 'sendmail',
    'local_domain' => 'local.example.org',
    'command' => '/usr/sbin/sendmail -bs',
]);