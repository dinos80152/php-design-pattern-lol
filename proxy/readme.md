# Proxy

## Problem

* We don't want client access object directly, due to security, performance, , , facility and etc...

## Roles

* Subject: Interface
* RealSubject
* Proxy

## Details

* Provides a surrogate or placeholder for another object to control access it.
  * Remote Proxy: controls access to a remote object.
  * Virtual Proxy: controls access to a resource that is expensive to create.
  * Protection Proxy: controls access to a resource based on access rights.
* Proxy vs. Decorator
  * Decorator add object's behavior.
  * Proxy control access to a object.
* Proxy vs. Adapter
  * Adapter changes object's interface.
  * Proxy and object has the same interface.
* Live Example
  * Firewall Proxy
  * Smart Reference Proxy
  * Caching Proxy
  * Synchronization Proxy
  * Complexity Hiding Proxy
  * Copy-On-Write Proxy