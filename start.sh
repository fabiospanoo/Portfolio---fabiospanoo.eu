#!/usr/bin/env bash
set -e

if [ ! -d "public" ]; then
    exit 0
fi

exec php -S 0.0.0.0:${PORT:-8080} -t public