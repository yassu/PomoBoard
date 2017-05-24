vagrant upする前に

```
$ plugin install vagrant-vbguest
```

を実行すること. (virtual box guestをいい感じにいれるため)

最初にvagrant upした直後にデータを設定するために

```
$ mysql -uroot -ppassword taskboard < /vagrant/vagrant_resources/set_schema.sql
```

を実行すること.
