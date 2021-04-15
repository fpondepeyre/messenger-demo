Messenger demo
==============

```
composer install
docker-compose up -d
symfony serve -d
./bin/console app:import:subscriptions subscriptions.csv
./bin/console messenger:consume async
```

* https://symfony.com/download
* https://github.com/fpondepeyre/messenger-demo
* https://symfony.com/doc/current/messenger.html
* https://github.com/thephpleague/csv
* https://github.com/zenstruck/console-test
* https://github.com/zenstruck/messenger-test
