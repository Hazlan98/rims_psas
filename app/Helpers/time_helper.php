<?php

use CodeIgniter\I18n\Time;

function timeAgo($datetime)
{
    return Time::parse($datetime)->humanize();
}
