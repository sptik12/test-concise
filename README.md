Installation notes:

1. Unpack zip
2. Copy .env-dist to .env
3. Check and change parameters in .env if needed
4. Build docker image, create and run containers

   docker-compose build
   
   docker-compose up
   
5. Now you can check test app entering http://localhost:8888 in your browser.

6. You can view database using PhpMyAdmin opening http://localhost:8889 in your browser.

