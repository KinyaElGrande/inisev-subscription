#Inisev Subscription API

### Prerequisites
- Php ^8.0.2
- MySQL ^5.7
- Composer ^1.0


### Installation
1. Clone the repository
2. Run `composer install`
3. Copy env.example.env to .env
4. Run `php artisan key:generate`
5. Run `php artisan migrate`
6. Run `php artisan db:seed`
7. Configure your mail client in .env file
8. Run `php artisan serve` to fire up your application.
9. Open your API client and go to http://localhost:8000/api/v1/ to test your API.

### Api Endpoints
- `api/v1/user/create`: `POST` - Create a new User (Requires `name`, `email`)
- ` api/v1/website/create`: `POST` - Create a new Website (Requires `name`, `url`)
- `api/v1/user/{user}/website/subscribe`: `POST` - User subscribes to a website (Requires `website_id`)
- `api/v1/website/{website}/post/create`: `POST` - Create a new post for a website (Requires `title`, `content`)

> Note: Whenever a new post is published on a particular website, 
> all the users who subscribed to that website will receive an email notification after running
>  `php artisan queue:work` command
