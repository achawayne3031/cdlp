

# CDLP HUB Interview Test 

https://github.com/achawayne3031/cdlp

Server Folder Set Up

1. clone the git repo
2. move the CDLP folder to your xampp/htdocs folder OR your WAMP folder
3. open the public folder, .htaccess file and make sure that the 
project root folder name is the same the "RewriteBase" Base URL 

this will help to point the server to the right file entry.

# Note: if not set properly, the project will not be served 

e.g: 
My own project root folder name is CDLP
which makes my "RewriteBase" to be /cdlp/public


4. Update the URLROOT on the app/config/config.php with the correct root project folder name,
to avoid wrong routing.


Mysql Database Set Up
1. Create your database
2. update and set the database details on the app/config/config.php file
3. open the sql folder and import all the tables into your database


Email SMTP Set up
1. update and set your Email SMTP details on the app/config/config.php file



Cron Job Set up (Windows)
1. Search for Task Scheduler on your windows start menu
2. Create a new Task
3. set the name of the task on the General Tab
4. Create a new Trigger on the Trigger tab, set the start date and the repeat task occurrence
5. On the Action Tab. Add the following
6. the Program Script: which is the file path of your php.exe

e.g: my own php.exe file path is C:\xampp\php\php.exe

7. Update the Start In Option, which is the directory path of the cron job

e.g: My own is C:\xampp\htdocs\cdlp\app\cron

8. Update the Add argument, which is the cron job file

e.g my own is my_jobber.php

9. Save the cron job and wait for it for occur
10. you can equally click on the run button to start or run it.


11. on the cron job file app/cron/my_jobber.php
12. Ensure the all the file directory that is "require" in the my_jobber.php is accurate according to own server 
folder directory



# Note
Ensure all the necessary folder directory is updated, in order for the system to run effectively

Thank You




