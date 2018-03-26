Recommendation service
------------------------
Recommendation service find the best movie to watch on a given day

Requirements
---------------
* PHP 7+

Installation
------------
 
Through [Composer](http://getcomposer.org) as [Dacascas/recommendation].

Usage
-----
After you did the installation step you can use the script as you usually execute any php script.
In project has been setted config file for two env (qa, prod) that why you can run script with next command:

**ENV=prod php recommendation.php genre=Drama time=7.00**

You must know that time parameter is Timezone depended. In case if you want use you current timezone you have to use other format like **12:00:00+11:00**. In other case timezone will be taken local.