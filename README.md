## Short URL

短网址程序，用于压缩长网址并随机生产5~7位英文字母+数字作为短址

例： http://url.so/iMTk4O

### 安装说明
```bash
# 1. 使用 composer 安装程序依赖
$ composer install
# 2. 安装数据库结构
$ php ./Package/bin/phinx magrite
```

### Nginx Rewrite

```nginx

root /home/shortUrl/Public;

# 路由
if (!-e $request_filename) {
    rewrite (.*) /index.php last;
}
```