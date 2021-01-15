<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilesReadyForLaravel extends Controller
{
    public function dockerCompose(){
        return '
        version: "3.5"
        services:
            enxuto-app:
                build:
                    context: "."
                volumes:
                    - .:/var/www/html
                ports:
                    - 81:80
            
                restart: unless-stopped
                tty: true
                dns:
                    - 8.8.8.8
                environment:
                    STORE_IMAGE: ""
                    WIDTH_IMAGE: 110px
                    STORE_NAME: ""
                    APP_URL: http://
                    MIX_URL_SERVICE: http://
                    DB_CONNECTION: mysql
                    DB_DATABASE: db-name
                    DB_HOST: 
                    DB_PASSWORD: 
                    DB_PORT: 3306
                    DB_USERNAME: 
                    FILESYSTEM_CLOUD: s3
                    AWS_ACCESS_KEY_ID: 
                    AWS_BUCKET: 
                    AWS_DEFAULT_REGION: 
                    AWS_SECRET_ACCESS_KEY: 
                    AWS_URL: 
                networks:
                    - app-network
            mysql-db:
                image: mysql:5.7
                container_name: mysql_db_name
                volumes:
                    - ./run/var:/var/lib/mysql
                environment:
                    MYSQL_DATABASE: 
                    MYSQL_ROOT_PASSWORD: 
                networks:
                - app-network
        
        networks:
          app-network:
            driver: bridge
        ';
    }
}
