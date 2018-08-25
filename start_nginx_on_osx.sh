#!/bin/sh
workingDirectory=$(pwd)
nginxConfigurationFile="${workingDirectory}/nginx_configuration/nginx_mac.conf"
sudo nginx -c "$nginxConfigurationFile" 
