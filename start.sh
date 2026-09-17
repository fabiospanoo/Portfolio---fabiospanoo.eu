#!/usr/bin/env bash
set -e

exec php -S 0.0.0.0:${PORT:-8080} -t public