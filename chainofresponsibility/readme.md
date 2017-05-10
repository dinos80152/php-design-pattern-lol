# Chain of Responsibility

## Problem

* A request should be handle by one of the same type handler.

## Roles

* Handler
* ConcreteHandlers

## Details

* Avoids coupling the sender of a request to the receiver by giving more than one object a chance to handle the request.
* Refactor Switch Case.
* Adds or removes responsibilities dynamically by changing the members or order of the chain.
* Encapsulate the processing elements inside a "pipeline" abstraction.