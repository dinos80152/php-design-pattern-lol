# Visitor

## Problem

* Add a distinct and unrelated operations to a structure of objects, we don't want to add method on each class.

## Roles

* Visitor: interface
  * visit()
* ConcreteVisitors
  * visit()
* Visitable: interface
  * accept()
* ConcreteVisitables
  * accept()
* ObjectStructure

## Details

* Adds operations to a composite structure without changing the structure itself.
* The code for operations performed by the visitor is centralized.
* Make different operations depending on the class used.
* The composite classes' encapsulation is broken.
* Decouple logical code from elements.