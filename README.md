## Installation


```bash
$ git clone https://github.com/mokgosi/badger-dv-tst.git 
```

## Database

```bash
$ mysql -u root -p  -  no need for password
```

```bash
mysql> create database badgersdvtst;
```

```bash
mysql> exit;
```

```bash
$  mysql -u root -p badgersdvtst < meta\database.sql
```


##Finally setup you vhost to point to your proj root folder


