# Command

## Roles

* Client
* Receiver
* Command Interface
* Command Implementation
* Invoker

## Details

* An object encapsulates everything needed to execute a method in another object
* Loose coupling from client and executer.
* Macro Command.
* Undo, logging, queue, etc...
* Cons: many tiny command classes.