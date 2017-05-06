# Flyweight

## Problem

Creating large number of similar objects consume too much memory usage.

## Roles

* Entity
* Manager
* (Factory)

## Details

* Reduce Memory usage by share objects instead of creating objects.
* Separate object Intrinsic State and Extrinsic State.
  * Intrinsic state in construct.
  * Extrinsic State in method parameter.
* if an Intrinsic State is limited, we could create a factory to avoid create new object every time.
* flyweight vs. singleton
  * singleton is often mutable.
  * flyweight is immutable.

## Reference

* [What are the practical use differences between Flyweight vs Singleton patterns?@stackoverflow](http://stackoverflow.com/questions/16750758/what-are-the-practical-use-differences-between-flyweight-vs-singleton-patterns)