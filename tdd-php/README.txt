### BUILD CONTAINER
docker build -t tdd-php .

### RUN CONTAINER
docker run -p 80:80 -v /c/Users/jbecc/Documents/Dockerfiles/tdd-presentation/tdd-php/src:/var/www/html --name="tdd-php" tdd-php