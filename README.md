Web application
===========

[PIXELION CMS](https://pixelion.com.ua)

[![Latest Stable Version](https://poser.pugx.org/panix/app/v/stable)](https://packagist.org/packages/panix/app)
[![Total Downloads](https://poser.pugx.org/panix/app/downloads)](https://packagist.org/packages/panix/app)
[![Monthly Downloads](https://poser.pugx.org/panix/app/d/monthly)](https://packagist.org/packages/panix/app)
[![Daily Downloads](https://poser.pugx.org/panix/app/d/daily)](https://packagist.org/packages/panix/app)
[![Latest Unstable Version](https://poser.pugx.org/panix/app/v/unstable)](https://packagist.org/packages/panix/app)
[![License](https://poser.pugx.org/panix/app/license)](https://packagist.org/packages/panix/app)



Installation
------------
After installing Composer, run the following command to install the [Composer Asset Plugin](https://github.com/fxpio/composer-asset-plugin)

#### First run
```
php composer global require "fxp/composer-asset-plugin:^1.2.0"
```

#### Either run for dev
```
php composer create-project panix/app . "dev-master"
```

#### Either run for production
```
php composer create-project --prefer-dist --no-dev --stability=dev panix/app . "dev-master"
```