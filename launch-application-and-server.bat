@echo off
start cmd /k "pnpm run dev"
start cmd /k "cd api && php -S 127.0.0.1:5500"
exit