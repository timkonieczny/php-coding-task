1. What does the `final` keyword mean the [DownloadLog](orm/DownloadLog.php) model? What are the implications in removing the `final` declaration?<br/>
The final keyword prevents any class from extending DownloadLog. If it wasn't final and a class would extend it, then it is possible that the object does not line up with the database anymore. The final keyboard prevents inconsistencies between the database and the object.
2. The current of implementation of [DownloadLog](orm/DownloadLog.php) contains a fatal error. What is it, and how would it be resolved?<br/>
ActiveRecord implements ActiveRecordInterface but it does not implement isModified(). Because DownloadLog extends ActiveRecord, isModified() needs to be implemented there.