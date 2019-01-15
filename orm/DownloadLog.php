<?php

namespace Orm;

use ActiveRecord;

final class DownloadLog extends ActiveRecord
{
    /* @var int */
    private $fileId;

    /* @var int */
    private $userId;
}
