## ポスクラ
建築を投稿・閲覧・保存ができるサイト

## 公開
https://poscra.com/

## 開発環境
Docker, PHP, npm, composer が必要
1. `composer install`

2. copy & edit .env.example
```shell
cp .env.example .env
```
.env　の必要な部分を書き換え
GOOGLE系は GCPにログインしてシークレットキーなどを取得

3. sail up
```shell
sail up -d
```
