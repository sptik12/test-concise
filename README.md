Installation notes:

1. Unpack zip
2. Copy .env-dist to .env
3. Check and change parameters in .env if needed
4. Build docker image, create and run containers

   docker-compose build
   
   docker-compose up
   
5. Now you can check test app opening web container in terminal and entering
such command like:

php yii image/generate 200,300,500 
php yii image/generate 200,300x400,500 
php yii image/generate 200,1x400,500    -  будет исключение, не все миниатюры сгенерируются
php yii image/generate 200,100,500 1 0
php yii image/generate 200,100,500 0 0
php yii image/generate 200,100,500 0 1
php yii image/generate 200,100,500 1 1

etc.