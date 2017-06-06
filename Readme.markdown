vagrant upする前に

```
$ plugin install vagrant-vbguest
```

を実行すること. (virtual box guestをいい感じにいれるため)

最初にvagrant upした直後にデータを設定するために/var/www/htmlで

```
$ php index.php migrate current
```

を実行すること.
