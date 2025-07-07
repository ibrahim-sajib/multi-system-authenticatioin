#Multi-system-authentication using sso

```bash
# clone
git clone

#copy the .env.example content and make a .env file for both ecommerce-app and foodpanda-app

#install composer backend
composer install

#generate app key in backend
php artisan key:generate


#migrate and seed the data backend
php artisan migrate

#run the each project on their appropriate port

#for ecommerce
php artisan serve --port=8000

#go on this url http://127.0.0.1:8000

#for foodpanda
php artisan serve --port=8001

#go on this http://127.0.0.1:8001 url


#install laravel passport and configure this
php artisan passport:install --force

#set client after a creating a user and set id, name, direct url
php artisan passport:client

#set this http://127.0.0.1:8001 url as client url

#set client_id and client secret on the foodpandas env 

#Demo New client created successfully.
# Client ID: 9f542125-6222-46ef-9ecf-193ff9a8b2e4
# Client secret: IZ2SfAb0QdCfUl7L1V8LFXDKuVM1Va0oOJeXByim


```

