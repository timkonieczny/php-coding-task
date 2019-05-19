<?php 
    use DownloadLog;
    $downloadLog = Orm\DownloadLog::create();
    echo ($downloadLog->isModified() ? "DownloadLog is modified\r\n" : "DownloadLog is not modified\r\n");
    $downloadLog->setFileId(1000)->setUserId(2000);
    echo ($downloadLog->isModified() ? "DownloadLog is modified\r\n" : "DownloadLog is not modified\r\n");
    echo ("UserId is: " . $downloadLog->getUserId() . "\n");
?>