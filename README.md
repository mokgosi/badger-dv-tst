## Installation


```bash
$ git clone https://github.com/mokgosi/badger-dv-tst.git 
```

## Database

```bash
mysql> create database badgersdvtst;
```

```bash
mysql> exit;
```

```bash
$  mysql -u root -p badgersdvtst < meta\database.sql
```
Then open database.php from root of project and amend accordingly.

##Comoser

```bash
$  composer dump-autoload
```

##Finally setup you vhost to point to your proj root folder

You are good to go.


