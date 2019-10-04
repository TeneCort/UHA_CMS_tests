# For this project you will need: 


* php 7.2

* docker

* docker-compose

<--------||-------->

##For the app to have access to the DB:

1. Open a terminal in the app root dir

2. # cd app/model

3. # touch db.ini

4. # nano db.ini

5. # paste the following :

host = 0.0.0.0
name = cms
user = root
pass = example
type = mysql

**Attention:** If you change any of the above values, make sure you change it's counterpart inside the .env file at the root dir

<--------||-------->

##To launch the app, first launch the images from app root dir

1. sudo docker-compose up -d

2. cd public

3. php -S localhost:8000

4. open your browser