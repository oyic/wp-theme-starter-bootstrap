# WordPress Starter Theme Webpack Package (bootstrap) :metal:
[![ForTheBadge built-with-love](http://ForTheBadge.com/images/badges/built-with-love.svg)](https://GitHub.com/Naereen/)

This is a package specifically for WordPress Development in macOS environment.

## Requirements
1. npm or yarn (yarn preffered) :metal:

## Installation
1.  Clone `git clone https://github.com/oyic/wp-theme-starter.git` to your theme folder.

## Usage
* ```yarn install``` - install necessary dependencies.
* ```yarn dev``` or ```yarn watch``` - for development compilation (watch for continues update of your source code).
* ```yarn dist``` - for final build up for productions (minify/uglify/delete hash).
* ```composer install``` to add the TGPMA plugin

## Includes
1. Bootstrap 4
2. FontAwesome Free
3. Slick Carousel
4. [AOS - Animate On Scroll](https://github.com/michalsnik/aos "AOS")
5. [Parallax-Scroll](https://www.npmjs.com/package/parallax-scroll "Parallax-Scroll")
6. [TGPMA](https://packagist.org/packages/tgmpa/tgm-plugin-activation) via composer (yeah composer!) :punch:

### Notes:
* Use BEM on styling by ```@include el(element)``` & ```@include mod(modifer)```


