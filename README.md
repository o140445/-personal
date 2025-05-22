
# Personal Website

一个基于 Laravel 10 开发的个人网站项目，包含项目展示、博客等功能。

## 功能特点

- 响应式设计，支持各种设备访问
- 项目展示与管理
- 博客文章系统
- 后台管理系统
- 图片上传与管理
- 技术栈标签系统

## 技术栈

- PHP 8.1+
- Laravel 10
- MySQL 8.0+
- Tailwind CSS
- Alpine.js
- Laravel Mix

## 系统要求

- PHP >= 8.1
- Composer
- Node.js >= 16
- MySQL >= 8.0
- NPM

## 安装步骤

1. 克隆项目
```bash
git clone [项目地址]
cd personal-website
```

2. 安装 PHP 依赖
```bash
composer install
```

3. 安装前端依赖
```bash
npm install
```

4. 复制环境配置文件
```bash
cp .env.example .env
```

5. 生成应用密钥
```bash
php artisan key:generate
```

6. 配置数据库
编辑 `.env` 文件，设置数据库连接信息：
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=personal_website
DB_USERNAME=your_username
DB_PASSWORD=your_password



7. 运行数据库迁移
```bash
php artisan migrate
```

8. 填充测试数据（可选）
```bash
php artisan db:seed
```

9. 创建存储链接
```bash
php artisan storage:link
```

10. 编译前端资源
```bash
npm run dev
```

11. 启动开发服务器
```bash
php artisan serve
```

## 部署步骤

1. 服务器环境配置
```bash
# 安装必要的 PHP 扩展
sudo apt-get install php8.1-fpm php8.1-mysql php8.1-mbstring php8.1-xml php8.1-zip php8.1-gd

# 安装 Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# 安装 Node.js
curl -fsSL https://deb.nodesource.com/setup_16.x | sudo -E bash -
sudo apt-get install -y nodejs
```

2. 项目部署
```bash
# 克隆项目
git clone [项目地址]
cd personal-website

# 安装依赖
composer install --no-dev --optimize-autoloader
npm install
npm run build

# 配置环境
cp .env.example .env
php artisan key:generate

# 配置数据库
# 编辑 .env 文件设置数据库信息

# 运行迁移
php artisan migrate --force

# 创建存储链接
php artisan storage:link

# 设置目录权限
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

3. Nginx 配置示例
```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /path/to/personal-website/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

4. 配置 SSL（推荐）
```bash
# 安装 Certbot
sudo apt-get install certbot python3-certbot-nginx

# 获取 SSL 证书
sudo certbot --nginx -d your-domain.com
```

## 维护命令

```bash
# 清除缓存
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# 优化自动加载
composer dump-autoload -o

# 优化配置加载
php artisan config:cache
php artisan route:cache
```
