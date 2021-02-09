<?php
return [
    'staticPath' => dirname(__DIR__, 2) . '/storage',
//    'staticPath' => realpath('./../../storage'),
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'user.passwordResetTokenExpire' => 3600,
];
