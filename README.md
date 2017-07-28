# Instant WordPress Container

Sets up and runs an automated isolated instance of an existing wordpress installation in docker containers.

## Requirements
1. Docker-engine or docker-machine.
2. Docker-compose.
3. SQL dump/export from the website database.
4. A backup of the wordpress servers "wp-content" directory.
5. Enough free harddrive space (proportional to website size x3)

## Usage
1. Move SQL export of database to "database" directory and rename to "dump.sql".
2. Copy "wp-content" directory from website server to "wordpress" directory.
3. Copy "wp-content" directory and rename it to "wp-content-original", this will let you reset the files.
3. Start docker
4. Run "docker-compose up -d" from commandline in the "instantwordpress" directory.

## Info
All dependencies are then downloaded, and the Docker containers are initialized and run.
After dependencies are initially downloaded, startup shouldn't take more than half a minute on the average pc.

If docker-machine (docker toolbox) and not docker-engine (native docker) is installed, ports must be forwarded on the virtualbox using the command:

docker-machine ssh default -L 8000:localhost:8000 -L 8080:localhost:8080

This command must be run after container startup and can be quit using "exit".

The two host-facing services are wordpress itself and phpmyadmin.
These can be accessed through:

wordpress: localhost:8000
phpmyadmin: localhost:8080

To stop the docker containers run "docker-compose down" from commandline in the "instantwordpress" directory.
The wp-content folder is mounted by the docker container, and the database is imported to the container and thereafter persistent between runs.
These can be reset by using commands:
1. stop docker and delete database: docker-compose down -v
2. delete "wp-content" directory and replace with new copy of "wp-content-original"
3. start docker: docker-compose up -d

To export the database, use phpmyadmins export options.

Warnings:
If you are using docker toolbox/machine (on pc) always issue commands using the quickstart terminal.