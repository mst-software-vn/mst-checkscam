<?php

if (!function_exists('getCommentRateLimitKey')) {
    function getCommentRateLimitKey(string $ip): string
    {
        return 'comment_limit_' . md5($ip);
    }
}
