#!/bin/bash
DIR=$1
if [ ! -d "$DIR" ]; then
        mkdir $DIR
        chmod 777 $DIR
        cp -R /var/sftp/template/. $DIR
fi

