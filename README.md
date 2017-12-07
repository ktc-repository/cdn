CDN KTC FOR LARAVEL
===================


Steps for installing the CDN for lavavel and voyager.

----------

Envoy Task Runner
-------------
Complete documentation on the **official website of  [Laravel][001]**

 [001]: https://laravel.com/docs/5.5/envoy


It runs on the console the following command of composer
> composer global require **laravel/envoy**

.env
-------------
Set the following variables in your environment file.

**FILESYSTEM_DRIVER**
It defines the new driver to use (default is sftp).

**CDN_BASE**
Actual absolute path where are stored across content repositories

**CDN_BASE_SUBDIRECTORY**
ID only, create a directory for the project, do not use special characters or spaces.

**CDN_SSH_USERNAME**
User's ssh connection that is used locally.

**CDN_SSH_PRIVATE_KEY_PATH**
Key SSH connection, the path must be absolute to the computer.

**CDN_SSH_HOST**
Connection to the CDN host

**CDN_PUBLIC**
Access for the public to the CDN

**Full example**

```bash
FILESYSTEM_DRIVER=sftp
CDN_BASE=/example/path
CDN_BASE_SUBDIRECTORY=exampleProject
CDN_SSH_USERNAME=root
CDN_SSH_PRIVATE_KEY_PATH=/Users/example/.ssh/id_rsa
CDN_SSH_HOST=experience.ktcagency.com
CDN_PUBLIC=cdn.experience.ktcagency.com
```

Install the library 
-------------

> composer require ktc/cdn

Add the service provider
-------------

Edit the file **/config/app.php** 

Adds a new value at the end of the array **providers**

```php
'providers' => [
//....
//...
//.
CDN\CDNServiceProvider::class
```

Configure new driver
-------------

Edit the file **/config/filesystems.php** 

Adds a new value at the end of the array **disks**

```php
'disks' => [
//....
//...
//.
'sftp' => [
	'driver'   => 'sftp',
	'host' => env('CDN_SSH_HOST'),
	'port' => 22,
	'username' => env('CDN_SSH_USERNAME'),
	'password' => '',
	'privateKey' => env('CDN_SSH_PRIVATE_KEY_PATH'),
	'root' => env('CDN_BASE').'/'.env('CDN_BASE_SUBDIRECTORY'),
]
```

Create the new repository in the CDN Server
-------------

> php artisan cdn:install


Ready.

----


If you are using Voyager
-------------

Edit the file **/config/voyager.php** 

Changes the value of **storage** 

```php
'storage' => 
	[
		'disk' => 'sftp',
	],
```