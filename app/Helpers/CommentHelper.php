<?php

namespace App\Helpers;

class CommentHelper
{
    public static function getCommentRateLimitKey(string $ip): string
    {
        return 'comment_limit_'.md5($ip);
    }
}
