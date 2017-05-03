# Template Method

## Problem

* Two classes have the same steps but different implementations.

## Roles

* Abstract Superclass
* Subclass
* (hook)

## Details

* Superclass defines steps of algorithm, subclass implement methods.
* Define algorithm as final to prevent subclass override.
* We could use hook to change algorithm flow.
* "Hollywood Principle: Don't call us, we'll call you"
* Compare with Strategy Pattern, Factory Pattern
  * Factory is one of Template Method.
  * Template Method use inherited, Strategy use composite.