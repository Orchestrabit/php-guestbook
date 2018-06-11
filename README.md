# PHP Guestbook

PHPの動作を確認するための

## データベース初期化方法

guestbookデータベースに、guestbookユーザーで、初期化する例

```
$ cd sql
$ mysql -u guestbook -p guestbook < create_tbl_guestbook.sql
```