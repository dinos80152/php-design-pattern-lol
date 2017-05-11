# Memento

## Problem

* Need to restore an object back to previous state.
  * Rollback
  * Undo

## Roles

* Memento
  * a lock box stores internal state of the Originator object.
* Originator
  * Creates a memento object capturing the originators internal state.
  * Use the memento object to restore its previous state.
* CareTaker
  * keeping memento and manage the collection of mementos.

## Details

* Fetch stored states and behaviors from main object.