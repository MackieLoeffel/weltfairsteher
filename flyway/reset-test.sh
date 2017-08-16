#!/bin/sh

set -e

cd $(dirname $(realpath "$0"))

flyway -configFile=local-test.conf clean migrate
