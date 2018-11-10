# PHP experiments
A simple dockerised PHP application using ngnix to load files locally for experimentation and learning purposes.

## Requirements
- `docker`
- `docker-compose`

## Installation
1. Clone the repo;
2. Install the requirements;
3. Update the local hosts file (`/etc/hosts`) to point `php-experiments.local` to the local Docker environment, i.e.
```
##
127.0.0.1       localhost, php-experiments.local
```
4. On the application top-level directory, run `docker-compose up -d`;
5. Visit `http://php-experiments.local/`; the application served should be exposed there.
