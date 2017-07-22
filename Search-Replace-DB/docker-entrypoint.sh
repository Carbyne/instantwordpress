#!/bin/bash

siteurl="$(php /get_siteurl.php)"
if [ "$siteurl" = "connection_error" ]
then
	echo "Database connection failed, sleeping 5 sec."
	sleep 5
	exit 1
else
	php srdb.cli.php -h db --port 3306 -n wordpress -u root -p root -s "$siteurl" -r "http://localhost:8000"
fi