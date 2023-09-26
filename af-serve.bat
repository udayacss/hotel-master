#! /bin/bash

@REM cd C:\Projects\Ceylonsoft\vision\Vision_User
start /b "user-f" npm run dev 
start /b "user-b" php artisan serve --port=8001
start /b "user-code" code .