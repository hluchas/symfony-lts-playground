#!/bin/bash

docker buildx build --platform linux/arm64 -t hluchas/mailhog:arm-latest --push .
