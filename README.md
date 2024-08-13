Author: Ong Cong Kin<br>
APP: Todo-list APP (Revised)<br>

TO start the app, download the folder, and follow the step:
1. Open the folder
2. find .env.example and rename it to: .env
3. Open the command prompt:
4. move to the dowloaded folder path: <br>
    command: cd (folder path)
5. update the composer: <br>
    command:<br>
    a. composer install<br>
    b. composer update
7. Generate App key:<cd>
    command: php artisan key:generate
8. Generate the sqlite database:
    command: php artisan migrate
9. build css file using node.js
    command: <br>
    a. npm install<br>
    b. npm run build 
10. run the server:<br>
    command: php artisan serve


Then, visit http://127.0.0.1:8000 at your browser

Function:
1. Create new task
2. Change the task's status
3. View the task details
4. Edit the task
5. Delete the task
6. Reset the task list after a period of inactive and browser close

Remark: 
1. the session lifetime is 120min, if want to change, please follow the steps:<br>
    a. change the period (min) for 'SESSION_LIFETIME' in '.env' file<br>
    b. change the period (min) for 'lifetime' in 'config/session.php' file
2. the user needs to re-login after the browser is closed, if want to change, please follow the steps:<br>
    a. configure the 'expire_on_close' in 'config/session.php' file