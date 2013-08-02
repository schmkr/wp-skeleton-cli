#!/usr/bin/env sh
mkdir -p shared;
mkdir -p shared/content;
mkdir -p shared/content/cache;
mkdir -p shared/content/uploads;
mkdir -p shared/content/w3tc-config;
chmod -R 777 shared;
ln -f -s ../shared/content/cache content/cache;
ln -f -s ../shared/content/uploads content/uploads;
