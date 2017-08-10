# Laravel Alerts
This package extends Laravel (5.1+) to provide those using th Twitter bootstrap framework to easily use alerts for status messages.
Got a form to submit and want to tell the user that it went OK or not? this package will help you do that.

Utilising the Laravel session driver, Alert's can remain between page loads or alternatively can be only valid for the current page instance.


## Usage
Add the service provider and facade to your config/app.php file in the appropriate arrays:
```php
# Service Provider
Crystalshardz\LaravelAlerts\LaravelAlertsServiceProvider::class,
# Facade
'Alert' => Crystalshardz\LaravelAlerts\Facades\LaravelAlertsFacade::class,
```

To create an alert accross page loads use the save() method
```php
Alert::save('your message here', 'success');
```
Valid alert methods match those found for the bootstrap CSS framework:
- default
- primary
- info
- success
- warning
- danger

A view has already been created within the package for displaying the alerts so you don't have to re-write the code. Simply include the view:
```php
@include('alerts::alert')
```
Alternatively if you wish to customise the view, you can publish the view:
```
php artisan publish
```

## Methods
| Method | Description |
|---|---|
| `Alert::message()` | Gets the currently set message text |
| `Alert::level()` | Gets the currently set alert level |
| `Alert::class()` | Returns the full TWBS class (alert-{level}) for the current level |
| `Alert::save(message, level)` | Sets a message which persists the next page load |
| `Alert::flash(message, level`) | Sets a message for the current page session. Message lost on page load |
| `Alert::renew()` | Renews the currently set message and level for the next page load |
