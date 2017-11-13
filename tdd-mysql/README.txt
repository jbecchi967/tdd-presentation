### BUILD CONTAINER
docker build -t tdd-mysql .

### RUN CONTAINER
docker run -p 3306:3306 --name="tdd-mysql" tdd-mysql

### AFTER STARTING
docker exec -it tdd-mysql /bin/bash
mysql -u root -p sales < /root/start.sql