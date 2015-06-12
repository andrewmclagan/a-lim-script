# The Solution

Misc points:

* Unix timestamp is in milliseconds, needs converting
* Use DateTime to set proper timezones for accurate stamp conversion
* merge smaller array into larger array, not the reverse

### Installation

1. Simply clone this repository.
2. Setup your hosts and server to point a `./public` directory.

**NOTE:** I did not have time for `.htaccess` rewrite rules so you must setup a domain e.g. `http://the-problem.app` pointing to the `./public` directory as root.

## Why so much code for a small problem?

My assumption was this exercise is to demonstrate my knowledge in **software design patterns** and how to execute them in a real world problem. I developed a small micro MVC framework. There are some very obvious flaws with the current setup although I think it does demonstrate my abilities and basic understanding of the concepts involved.

Also I wanted to demonstrate my ability to use modern development tools such as **git, package managers and task runners**.

Furthering this train of  through I demonstrated my ability as a **full-stack** developer implementing the front-end in **AngularJS**.

### Design Patterns & Concepts

* Repository Pattern
* Service Provider Pattern
* MVC View Model Controller pattern
* Dependancy Inversion Pattern (weakly)
* Single Responsibility
* Basic SOLID principals
* Domain Driven Design

### Tools Used

* Git (source control)
* Composer, NPM, Bower (package management)
* Gulp (task runer)
* more...

### libraries and dependancies

* AngularJS
* PHP 5.5
* lodash
* Javascript EMCA 6
* league/commonmark
* more...

### Time 

Developed in ~3.3hrs