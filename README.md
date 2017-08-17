## Short URL

短网址程序，用于压缩长网址并随机生产5~7位英文字母+数字作为短址

例： http://url.so/iMTk4O

### 安装说明
```bash
# 1. 使用 composer 安装程序依赖
$ composer install
# 2. 安装数据库结构
$ php ./Package/bin/phinx migrate
```

### Nginx Rewrite

```nginx

root /home/shortUrl/Public;

# 路由
if (!-e $request_filename) {
    rewrite (.*) /index.php last;
}
```


### :smile: Hashids 算法

- `Hashids` 是根据记录的 `id` 与 设置的 `HASHIDS_SALT` 生成唯一token 的一种算法.

- 它能够保证生成的 `token` 相对 `HASHIDS_SALT` 永不重复, 并且支持反向解密。

如果你使用 `Hashids` , 请务必去设置一个唯一的 `HASHIDS_SALT` , 并做好备份。
