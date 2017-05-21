## TODO

- [ ] header, footerを別ファイルに分ける
- [ ] migrationファイルを作る (ref: http://qiita.com/shikataka/items/d3fd15f650f85a8ce118)
- [ ] ユーザー認証 (ref: https://manablog.org/codeigniter_login_resister_function/)

- [ ] Taskを作成できるようにする
- [ ] Taskの詳細を見れるようにする
- [ ] Taskを検索できるようにする

- [ ] Ankenを作成できるようにする
- [ ] Ankenの詳細を見れるようにする
- [ ] Ankenを検索できるようにする
- [ ] TaskにAnkenを紐付ける
- [ ] TaskでAnkenを表示するようにする

## migration

User:
user_id, user_name, user_password, created_at, updated_at

Task:
task_id, user_id, anken_id, task_title, task_memo, created_at, update_at

Anken:
anken_id, user_id, anken_name, anken_memo, created_at, updated_at

BelongAnken:    # AnkenとUserの結びつきを表すtable
belong_anken_id, anken_id, user_id, created_at
