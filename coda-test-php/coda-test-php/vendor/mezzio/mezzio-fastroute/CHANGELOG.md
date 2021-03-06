# Changelog

All notable changes to this project will be documented in this file, in reverse chronological order by release.

## 3.2.0 - 2021-04-19


-----

### Release Notes for [3.2.0](https://github.com/mezzio/mezzio-fastroute/milestone/3)

Feature release (minor)

### 3.2.0

- Total issues resolved: **0**
- Total pull requests resolved: **1**
- Total contributors: **1**

#### Enhancement

 - [9: Psalm integration and GitHub actions](https://github.com/mezzio/mezzio-fastroute/pull/9) thanks to @gsteel

## 3.1.0 - 2020-12-21


-----

### Release Notes for [3.1.0](https://github.com/mezzio/mezzio-fastroute/milestone/1)



### 3.1.0

- Total issues resolved: **0**
- Total pull requests resolved: **1**
- Total contributors: **1**

#### Enhancement,hacktoberfest-accepted

 - [7: Bump dependencies to PHP8](https://github.com/mezzio/mezzio-fastroute/pull/7) thanks to @marcelthole

## 3.0.3 - 2019-06-20

### Added

- [zendframework/zend-expressive-fastroute#62](https://github.com/zendframework/zend-expressive-fastroute/pull/62) adds support for PHP 7.3.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 3.0.2 - 2018-08-02

### Added

- Nothing.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- [zendframework/zend-expressive-fastroute#59](https://github.com/zendframework/zend-expressive-fastroute/pull/59) modifies the `FastRouteRouter` to pass the URI path to `rawurldecode()` prior to performing
  its regex operations. This ensures that URL-encoded values can be matched as normal characters.
  If you were previously performing matches for URL-encoded values (e.g., `{id:b%20r}`), you may
  need to update your route matching expressions (e.g., `{id:b r}`).

## 3.0.1 - 2018-03-20

### Added

- Nothing.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- [zendframework/zend-expressive-fastroute#57](https://github.com/zendframework/zend-expressive-fastroute/pull/57)
  fixes how the `FastRouteRouter::getDispatcher()` method defines its return
  type hint to define it using the `FastRoute\Dispatcher` interface instead of
  the more specific `GroupCountBased` implementation; this change allows usage
  of alternate dispatchers with the router.

## 3.0.0 - 2018-03-15

### Added

- [zendframework/zend-expressive-fastroute#41](https://github.com/zendframework/zend-expressive-fastroute/pull/41) and
  [zendframework/zend-expressive-fastroute#46](https://github.com/zendframework/zend-expressive-fastroute/pull/46) add
  support for the mezzio-router 3.0 series.

- [zendframework/zend-expressive-fastroute#45](https://github.com/zendframework/zend-expressive-fastroute/pull/45) adds
  `Mezzio\Router\FastRouteRouter\ConfigProvider`, and updates the
  package to expose it to laminas-component-installer.

- [zendframework/zend-expressive-fastroute#54](https://github.com/zendframework/zend-expressive-fastroute/pull/54)
  adds a condition which throws a `InvalidCacheException` if a cache file
  exists and is not writable.

### Changed

- [zendframework/zend-expressive-fastroute#43](https://github.com/zendframework/zend-expressive-fastroute/pull/43)
  updates the `match()` logic to always call `RouteResult::fromRouteFailure()`
  with an argument; previously, it would omit the argument under specific
  conditions.

### Deprecated

- Nothing.

### Removed

- [zendframework/zend-expressive-fastroute#41](https://github.com/zendframework/zend-expressive-fastroute/pull/41)
  removes support for the mezzio-router 2.0 series.

- [zendframework/zend-expressive-fastroute#41](https://github.com/zendframework/zend-expressive-fastroute/pull/41)
  removes support for PHP 5.6 and PHP 7.0.

### Fixed

- [zendframework/zend-expressive-fastroute#56](https://github.com/zendframework/zend-expressive-fastroute/pull/56)
  makes the router use the exception documented in `RouterInterface`.

- [zendframework/zend-expressive-fastroute#47](https://github.com/zendframework/zend-expressive-fastroute/pull/47) and
  [zendframework/zend-expressive-fastroute#49](https://github.com/zendframework/zend-expressive-fastroute/pull/49)
  fix an issue with how a failure result is marshaled when the path patches
  but the request method does not. The package now correctly aggregates allowed
  methods for the route result failure instance.

## 2.2.1 - 2018-03-09

### Added

- Nothing.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- [zendframework/zend-expressive-fastroute#53](https://github.com/zendframework/zend-expressive-fastroute/pull/53)
  provides a default value of an empty array for the `FastRouteRouter::$routes`
  property. When no routes were present, and `generateUri()` was called, the
  previous `null` default would cause an error.

## 2.2.0 - 2018-03-08

### Added

- Nothing.

### Changed

- [zendframework/zend-expressive-fastroute#52](https://github.com/zendframework/zend-expressive-fastroute/pull/52)
  updates the minimum supported version of mezzio-router to 2.4.0.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 2.1.2 - 2017-12-06

### Added

- Nothing.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- [zendframework/zend-expressive-fastroute#42](https://github.com/zendframework/zend-expressive-fastroute/pull/42)
  removes support for the 3.0.0-dev versions of mezzio-router, as it
  contains backwards-incompatible API changes.

### Fixed

- Nothing.

## 2.1.1 - 2017-12-05

### Added

- [zendframework/zend-expressive-fastroute#40](https://github.com/zendframework/zend-expressive-fastroute/pull/40) adds
  support for 3.0.0-dev versions of mezzio-router, as there are no API
  changes at this time.

### Changed

- [zendframework/zend-expressive-fastroute#38](https://github.com/zendframework/zend-expressive-fastroute/pull/38)
  updates the laminas-stdlib dependency to also allow v2 releases, as the
  functionality we consume is the same between both major versions.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 2.1.0 - 2017-08-11

### Added

- [zendframework/zend-expressive-fastroute#33](https://github.com/zendframework/zend-expressive-fastroute/pull/33)
  adds PSR-11 Container Interface support.

### Changed

- [zendframework/zend-expressive-fastroute#32](https://github.com/zendframework/zend-expressive-fastroute/pull/32)
  changes to the standard route parser from FastRoute.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 2.0.0 - 2017-01-11

### Added

- [zendframework/zend-expressive-fastroute#25](https://github.com/zendframework/zend-expressive-fastroute/pull/25)
  adds support for mezzio-router 2.0. This includes a breaking change
  to those _extending_ `Mezzio\Router\LaminasRouter`, as the
  `generateUri()` method now expects a third, optional argument,
  `array $options = []`.

  For consumers, this represents new functionality; you may now pass router
  options, such as defaults, via the new argument when generating a URI.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 1.3.0 - 2016-12-14

### Added

- [zendframework/zend-expressive-fastroute#16](https://github.com/zendframework/zend-expressive-fastroute/pull/16) adds
  support for FastRoute's caching features. Enable these with the following
  configuration:

  ```php
  [
      'router' => [
          'fastroute' => [
              'cache_enabled' => true,                   // boolean
              'cache_file'    => 'data/cache/fastroute', // specify any location
          ],
      ],
  ]
  ```

  Once enabled, the first request will build the cache and store it, while
  subsequent requests will read directly from the cache instead of any routes
  injected in the router.

- [zendframework/zend-expressive-fastroute#23](https://github.com/zendframework/zend-expressive-fastroute/pull/23)
  adds support for PHP 7.1.

### Changed

- [zendframework/zend-expressive-fastroute#24](https://github.com/zendframework/zend-expressive-fastroute/pull/24)
  updates the router to populate a successful `RouteResult` with the associated
  `Mezzio\Route` instance. This allows developers to retrieve
  additional metadata, such as the path, allowed methods, or options.

- [zendframework/zend-expressive-fastroute#24](https://github.com/zendframework/zend-expressive-fastroute/pull/24)
  updates the router to always honor `HEAD` and `OPTIONS` requests if the path
  matches, returning a success route result. Dispatchers will need to check the
  associated `Route` instance to determine if the route explicitly supported the
  method, or if the match was implicit (via `Route::implicitHead()` or
  `Route::implicitOptions()`).

### Deprecated

- Nothing.

### Removed

- [zendframework/zend-expressive-fastroute#23](https://github.com/zendframework/zend-expressive-fastroute/pull/23)
  removes support for PHP 5.5.

### Fixed

- Nothing.

## 1.2.1 - 2016-12-13

### Added

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- [zendframework/zend-expressive-fastroute#19](https://github.com/zendframework/zend-expressive-fastroute/pull/19) fixes
  route generation for optional segments with regex char classes: e.g.
  `[/{param:my-[a-z]+}]`

## 1.2.0 - 2016-06-16

### Added

- [zendframework/zend-expressive-fastroute#17](https://github.com/zendframework/zend-expressive-fastroute/pull/17) upgraded
  the dependency to [`nikic/fast-route`](https://github.com/nikic/FastRoute) to
  [`^1.0.0`](https://github.com/nikic/FastRoute/releases/tag/v1.0.0).

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 1.1.1 - 2015-05-03

### Added

- [zendframework/zend-expressive-fastroute#7](https://github.com/zendframework/zend-expressive-fastroute/pull/7) adds
  support for merging the `defaults` passed in route options with the matched
  parameters when returning a route result. As an example, if you define a route
  as follows:

  ```php
  use Mezzio\Router\Route;

  $route = new Route(
      '/category/{category:[a-z]{3,12}[/resource/{resource:\d+}]',
      'CategoryResource',
      ['GET'],
      'category-resource'
  );
  $route->setOptions(['defaults' => [
      'resource' => 1,
  ]]);
  ```

  and match against the URL path `/category/foobar`, the route result returned
  will now also include a `resource` parameter with a value of `1`.

  This provides feature parity with other routing implementations.

- [zendframework/zend-expressive-fastroute#14](https://github.com/zendframework/zend-expressive-fastroute/pull/14) updates
  the FastRoute minimum version to `^0.8.0`. No BC break is expected by this change,
  but you should test your application to confirm.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- [zendframework/zend-expressive-fastroute#4](https://github.com/zendframework/zend-expressive-fastroute/pull/4) fixes
  URI generation when optional segments are in place, and ensures that if an
  optional segment with a placeholder is missing, but followed by one that is
  present, an exception is raised.
- [zendframework/zend-expressive-fastroute#8](https://github.com/zendframework/zend-expressive-fastroute/pull/8) fixes
  URI generation with variable substitution when the variable declaration in the
  route uses `{X,Y}` quantification.

## 1.1.0 - 2016-01-25

### Added

- [zendframework/zend-expressive-fastroute#6](https://github.com/zendframework/zend-expressive-fastroute/pull/6)
  updates the FastRoute minimum version to `^0.7.0`. No BC break is expected by
  this change, but you should test your application to confirm.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 1.0.1 - 2015-12-14

### Added

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- [zendframework/zend-expressive-fastroute#3](https://github.com/zendframework/zend-expressive-fastroute/pull/3) fixes
  an issue in how the `RouteResult` was marshaled on success. Previously, the
  path was used for the matched route name; now the route name is properly used.

## 1.0.0 - 2015-12-07

First stable release.

### Added

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 0.3.0 - 2015-12-02

### Added

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Now depends on [mezzio/mezzio-router](https://github.com/mezzio/mezzio-router)
  instead of mezzio/mezzio.

## 0.2.0 - 2015-10-20

### Added

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Updated mezzio to RC1.
- Added branch alias for dev-master, pointing to 1.0-dev.

## 0.1.1 - 2015-10-10

### Added

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Moved nikic/fast-route from `require-dev` to `require` section.

## 0.1.0 - 2015-10-10

Initial release.

### Added

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.
