# Builder

## Role

* Director
* Builder

## Details

* usually use to build a composited object.
  * object made up from other objects.
* encapsulate the composited object build process.
* allow director customize disordered by builder provided method.
* hide the creation of object's parts, director doesn't know the detail, only have some optional provided by builder.
* the implementation of builder could be substitute.
* Different with Factory
  * Customize