## VHR

VHR is a web application for recruitment:
## Setup

```bash
git clone https://github.com/MahmoudNaguib/vhr.git
cd  vhr
cp .env.example .env // Change your configurations
sudo npm install
sudo composer install
sudo chmod -R 777 storage
sudo chmod -R 777 public
php artisan migrate --seed
php artisan serve
```
## To run unit testing
```bash
vendor/bin/phpunit
```


## Default Admin user
```bash
Email: admin@demo.com
Password: demo@12345
```
## Default Employee user
```bash
Email: employee@demo.com
Password: demo@12345
```
## Default Recruiter user
```bash
Email: recruiter@demo.com
Password: demo@12345
```
## POSTMAN API
```bash
https://documenter.getpostman.com/view/375068/UyrGCExe

with the below env variables
url: localhost:8000
email: employee@demo.com
password: demo@12345
push_token: anyrandomtext
token: empty
```
## Serving uploads
```bash
{baseURL}/uploads/small/{imageName}
{baseURL}/uploads/large/{imageName}
