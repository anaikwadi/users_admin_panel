# Users Admin Panel
Users, Roles, Permission Management, Also Included Logs

<ul>
<li>After cloning this repository, go to the root folder, run the following command/s,
<pre>
    - composer update
    - cp .env.example .env</pre>
</li>
    
<li>Add Following Line In .env file to generate daily logs (if already not added ),
<pre>
    - APP_LOG=daily
</li>
    
<li>Copy LogViewerController From File Folder and replace into /vendor/arcanedev/log-viewer/src/Http/Controllers/,
<pre>
    - LogViewerController.php
</li>

<li>Update the database name, username & password. You can check the config/laratrust_seeder.php to create your own roles and permission level with users. This is only for seeding purpose and quick view.
<pre>
    - php artisan cache:clear
    - php artisan config:cache
    - php artisan view:clear
    - php artisan clear-compiled
    - truncate -s 0 storage/logs/laravel.log
    - php artisan migrate
    - php artisan db:seed
    - php artisan key:generate</pre> </li>

</ul>

## Last Work
Now you are ready to check out

<pre>
    - php artisan serve
</pre>
