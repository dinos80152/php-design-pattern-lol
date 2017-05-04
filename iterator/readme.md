# Iterator

## Problem

* We don't want to visit elements in different types of aggregation by their own way, it's duplicate code.

## Roles

* Class which has field of aggregation
  * createIterator(): Iterator
* Iterator: Interface
  * hasNext(): boolean
  * next(): object
* Class implements Iterator for specific class.

## Details

* We don't care what's the type of aggregation, only care how could we visit.
* It used to call collection, aggregation.
  * Array
  * ArrayList
  * HashTable
  * Set
  * Vector
  * Map
  * Enumeration
  * etc...
* we could use Polymorphism on the item we got from different aggregation.

## More

* [Laravel Collections](https://github.com/tightenco/collect/blob/master/src/Illuminate/Support/Collection.php)