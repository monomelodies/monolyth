# Folder layout
Monolyth recommends a certain folder layout. You're free to change this to your
own liking, but we've found the following a sane default for modern projects:

- `httpdocs` contains your public files. This means all static assets as wel as
  the entry point (`index.php`). Apart from aforementioned index, it should
  not contain any executable PHP code and all Javascript/CSS code should ideally
  be minified/uglified. There are some exceptions to this (see later on), but
  these should be denied direct access in your server configuration.
- `src` contains your source code. For PHP files, it should be in the autoloader
  configuration for Composer (e.g. `"psr-4": {"": "src/"}`).
- `docs` should contain your documentation, if you have any. We personally
  prefer `mkdocs` in combination with `phpdocumentor` and/or `esdoc` (for API
  documentation), but feel free to use whatever you want.
- `tests` contains your unit tests. For hybrid projects (combining e.g. PHP and
  AngularJS code) we usually create subdirectories, e.g.
  [`tests/gentry`](http://gentry.monomelodies.nl) and
  `tests/karma`. Again, choose your own test framework (the default is
  [Gentry](http://gentry.monomelodies.nl)).

> Where you place your Javascript is up to you. We usually use
> [AngularJS](https://angularjs.org) and transpile it from ES6 to ES5 using
> Babel, so for us it makes sense to put the separate source files alongside
> their PHP counterparts. More or less the same goes for CSS - we usually use
> SASS but it's really your choice. The example has a `_sass` folder for these,
> but Monolyth really doesn't care.

Additionally, we have the following recommendations for extra folders. You can
ignore them safely if your project doesn't need or use them, or if you prefer
something different:

- `info` for informational files. This is essentially any text file that doesn't
  comprise documentation, e.g. release notes or a todo list.
    - `info/sql` for your SQL schema(s).
- `bin` for executables.

> Note that if you change any of these (e.g. `src` to `source`) you'll probably
> need to modify a few `include` statements here and there as well, especially
> in `index.php` which sets things up.

A very basic project skeleton is included In `./example`. To view it in action,
you can do the following:

```bash
cd /path/to/example/httpdocs
php -S 127.0.0.1:8080
```

...and point your browser to `http://127.0.0.1:8080`. You can also use it as a
skeleton for your own project.

> Note that the include call for the autoloader will most likely use a different
> path.

