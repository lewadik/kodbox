# Deployment Walkthrough

This document describes how to deploy the Kodbox application using Docker Compose.


## Files Created
- `Dockerfile`: Defines the PHP-FPM application image with necessary extensions.
- `docker-compose.yml`: Defines the services (app, web, db, redis).
- `docker/nginx/conf.d/default.conf`: Nginx configuration.
- `config/setting_user.php`: Configures the application to use environment variables.

## How to Run

1.  **Build and Start Containers**

    Run the following command in the project root:

    ```bash
    docker-compose up -d --build
    ```

2.  **Access the Application**

    Open your browser and navigate to:

    [http://localhost](http://localhost)

3.  **Initial Setup**

    DB_HOST: db
    REDIS: redis

## Notes

- **Permissions**: If you encounter permission errors (especially on Linux/macOS), ensure the `data` directory is writable:
    ```bash
    cd ../ && chmod -Rf 777 kodbox/
    ```
- **Database**: The default database user/password is `kodbox`/`kodbox`. You can change this in `docker-compose.yml`.

## SSL Configuration

To enable SSL for your external domain:

1.  **Place Certificates**: Put your `cert.pem` and `key.pem` files in the `docker/nginx/ssl` directory.
2.  **Update Nginx Config**: Open `docker/nginx/conf.d/default.conf` and uncomment the SSL server block.
3.  **Restart**: Run `docker-compose restart web`.
