<?php

namespace Orm;

use ActiveRecord;

final class DownloadLog extends ActiveRecord
{
    /* @var int */
    private $fileId;

    /* @var int */
    private $userId;

    public function isModified():bool{
        return $this->isModified;
    }

    public static function create(){
        return new DownloadLog();
    }

    public function setFileId($id){
        $this->setField($this->fileId, $id);
        return $this;
    }

    public function setUserId($id){
        $this->setField($this->userId, $id);
        return $this;
    }

    public function getUserId(){
        return $this->userId;
    }
}
