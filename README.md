# sonata-admin-helper-bundle

## Introduction

This bundle

## Installation

### Require the package

`composer require hopeter1018/sonata-admin-helper-bundle`

### Add to kernel

#### Symfony 4+ or Symfony Flex

Add `/config/bundles.php`

```php
return [
  ...,
  HoPeter1018\SequentialCounterFormatBundle\HoPeter1018SonataAdminHelperBundle::class => ['all' => true],
];
```

#### Symfony 2+

Add `/app/AppKernel.php`

```php
$bundles = [
  ...,
  new HoPeter1018\SequentialCounterFormatBundle\HoPeter1018SonataAdminHelperBundle(),
];
```

### Config

```yaml
hopeter1018_sonata_admin_helper
```
