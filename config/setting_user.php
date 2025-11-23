<?php
// Load database configuration from environment variables
if (getenv('MYSQL_HOST')) {
    $config['databaseDefault']['DB_HOST'] = getenv('MYSQL_HOST');
    $config['databaseDefault']['DB_NAME'] = getenv('MYSQL_DATABASE');
    $config['databaseDefault']['DB_USER'] = getenv('MYSQL_USER');
    $config['databaseDefault']['DB_PWD']  = getenv('MYSQL_PASSWORD');
    $config['databaseDefault']['DB_PORT'] = getenv('MYSQL_PORT') ?: '3306';
}

// Load Redis configuration from environment variables
if (getenv('REDIS_HOST')) {
    $config['cache']['redis']['host'] = getenv('REDIS_HOST');
    $config['cache']['redis']['port'] = getenv('REDIS_PORT') ?: 6379;
    
    // Use Redis for session and cache if configured
    $config['cache']['sessionType'] = 'redis';
    $config['cache']['cacheType'] = 'redis';
}
