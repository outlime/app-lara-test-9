Remsys
===============

## Introduction
Remsys is a simple reminder system built using the [Laravel](http://github.com/laravel/laravel) PHP Framework. Simply enter your email, when you want to be reminded and your reminder, and let Remsys do the remembering for you!

## Important Note
If you wish to test this application in your machine, heads up! This application uses the [IronMQ](http://www.iron.io/mq/) Queue Driver and the [Mailtrap](https://mailtrap.io/) SMTP server for development purposes. You may use any of the drivers supported by Laravel such as [Beanstalkd](https://github.com/kr/beanstalkd), [Amazon SQS](https://aws.amazon.com/sqs/) or [Redis](http://redis.io/). You may also use a real SMTP service for email testing.

## Project Setup
#### Install Project
[Clone](github-windows://openRepo/https://github.com/outlime/app-lara-test-9) this repository to your machine. Run `composer install` to install the project dependencies.

#### Default Environment Setup
As mentioned above, by default this project is configured to use the **IronMQ** Queue Driver and the **Mailtrap** SMTP server. If you do not have accounts in the above services yet, please create one now. Register an Iron account [here](https://hud.iron.io/users/new) and a Mailtrap account [here](https://mailtrap.io/register/signup).


We will now setup the environment variables in the `.env` file.

First we will set IronMQ as our Queue Driver.
```
QUEUE_DRIVER=iron
```
Next, we will setup the mail settings. You can find your mailtrap credentials in the upper part of the demo inbox.

```
MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=YourUsername
MAIL_PASSWORD=YourPassword
MAIL_ENCRYPTION=tls
```
Finally, we will setup the IronMQ Driver. Go to your Iron [dashboard](https://hud.iron.io/dashboard) and create a new project. Now add the variables below with their corresponding values from your project. You can find your project credentials by clicking the key next to the project name.
```
IRON_TOKEN=YourProjectToken
IRON_PROJECT_ID=YourProjectID
IRON_QUEUE=YourProjectName
```

#### Custom Environment Setup
If you used the default setup above, you can skip this step. If however you wish not to use the IronMQ Queue Driver and/or Mailtrap SMTP server you need to follow the instructions below:

Set your `QUEUE_DRIVER` with your corresponding choice of queue driver. The supported drivers are listed in `config\queue.php`.

Next, setup your mail settings with the appropriate values from the SMTP server of your choice. For example, if you wish to use your Gmail account, your values will be something like:
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=mygmail@gmail.com
MAIL_PASSWORD=mypassword
MAIL_ENCRYPTION=tls
```

#### Timezone
This project is developed in a UTC+08:00 timezone. To avoid issues with time and date, please setup the appropriate timezone in `config\app.php`. You can find the available values [here](http://php.net/manual/en/timezones.php).

That's it! You are now done setting up the project!

## Developing
To run the project, run the following command:
```
php -S localhost:8888 -t public
```
Next, open another terminal and run the following command to listen for the queued emails:
```
php artisan queue:listen
```

## FAQ
#### The default date and time of the form does not match my system time
You system timezone and the timezone set in `config\app.php` are not the same.

#### I am not receiving any email
Make sure you performed `php artisan queue:listen`, otherwise check the credentials in your `.env` file.

#### I am receiving my email immediately even if I set a later time
You may be using the default `sync` driver of laravel, which cannot queue emails for sending at a later time.

#### I need more help regarding this topic
Visit Laravel's documentation about [queues](http://laravel.com/docs/5.1/queues).

## Project Contributors
#### Project Manager
* [Czarina Salvador](http://github.com/czawena)

#### Quality Assurance
* [Jhomar Galsim](http://github.com/GALSIM23)

#### Frontend Developers
* [Paula Tuazon](http://github.com/paulavinia)
* [Rae Pascual](http://github.com/heyraeee)

#### Backend Developers
* [Emman Cantoria](http://github.com/airotnac)
* [Emil Matubis](http://github.com/outlime)

<br>
---
*This readme is written by [Emil](http://github.com/outlime). Need more help? Contact me.*