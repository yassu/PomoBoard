vagrant upする前に

```
$ plugin install vagrant-vbguest
```

を実行すること. (virtual box guestをいい感じにいれるため)

最初にvagrant upした直後にデータを設定するために/var/www/htmlで

```
$ mysql -uroot -ppassword pomoboard < /vagrant/vagrant_resources/set_schema.sql
$ php index.php migrate current
```

を実行すること.
