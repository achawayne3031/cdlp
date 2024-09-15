<?php


date_default_timezone_set('Asia/Kolkata');
file_put_contents('./cron_result.txt', 'IST — -> ' . date('Y-m-d H:i:s') .'\t\t\t' . $text . '\n',FILE_APPEND);






