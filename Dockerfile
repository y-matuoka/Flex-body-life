# 公式のPHP 8.0.0イメージにApache web serverがプリインストールされたベースイメージを設定
FROM php:8.0.0-apache

# コンテナに必要なパッケージ(zip、unzip、git)をインストール
RUN apt-get update && apt-get install -y \
  zip \
  unzip \
  git

# PHPアプリケーションの処理を高速化する拡張機能をインストール
RUN docker-php-ext-install -j "$(nproc)" opcache && docker-php-ext-enable opcache

# デフォルトのApacheポートを80から8080に変更
RUN sed -i 's/80/8080/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# デフォルトのApacheドキュメントルートを/var/www/htmlから/var/www/html/publicに変更
RUN sed -i 's#/var/www/html#/var/www/html/public#g' /etc/apache2/sites-available/000-default.conf

# Laravelのルーティング機能を使用できる様、ApacheのURLリライト機能を有効化
RUN cd /etc/apache2/mods-enabled \
&& ln -s ../mods-available/rewrite.load

# php.ini-productionをphp.iniにリネーム（サーバー環境に適したPHPの設定を、PHP設定ファイルとして使用）
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# コンテナの作業ディレクトリを/var/www/htmlに設定
WORKDIR /var/www/html

# 現在のディレクトリ(プロジェクトの中身)をコンテナの/var/www/htmlにコピー
COPY . ./

# Composerのインストール
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer

# プロジェクトファイルの所有者を、rootユーザーからApacheのデフォルトユーザーに変更
RUN chown -Rf www-data:www-data ./

# venderの作成
RUN composer install

# APP_KEYの表示
RUN php artisan key:generate --show