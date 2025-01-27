# Changelog

All notable changes to `laravel-printing` will be documented in this file.

## 2.0.1 - 
### Fixed
- Make `\Rawilk\Printing\Drivers\PrintNode\Entity\Printer` compatible with implemented `JsonSerializable` interface

### Updated
- Add support for Printnode PDF_Base64 ContentType ([#23](https://github.com/rawilk/laravel-printing/pull/23))

## 2.0.0 - 2021-01-11
### Updated
- Add support for php 8
- Drop support for php 7
- Drop support for Laravel 6
- Drop support for Laravel 7
- Remove driver dependencies from always being required
- Require user to pull in the driver dependencies for their drivers now

## 1.3.0 - 2020-09-13
### Added
- Add support for custom drivers
- Add support for changing print drivers on the fly

## 1.2.2 - 2020-09-08
### Added
- Add support for Laravel 8

## 1.2.1 - 2020-09-04
### Fixed
- Fix page range issue with CUPS driver ([#3](https://github.com/rawilk/laravel-printing/issues/3)).

## 1.2.0 - 2020-09-02
### Added
- Add support for CUPS driver.

## 1.1.6 - 2020-07-23
### Changed
- Remove `int` parameter type hint on `PrintNodePrintJob` `id` setter.

## 1.1.5 - 2020-07-22

### Fixed
- Ensure `str_repeat` gets repeated at least once to avoid fatal error on `twoColumnText`.

## 1.1.4 - 2020-07-15

### Fixed
- Return the job id of a new print job with PrintNode ([#1](https://github.com/rawilk/laravel-printing/issues/1)).

## 1.1.3 - 2020-07-09

### Changed
- Add return type `string` to `id()` method on PrintNode Printer.
- Add more method doc blocks to `ReceiptPrinter` for type hinting to underlying printer class.

## 1.1.2 - 2020-07-08

### Fixed
- Fix strict type comparison when finding a printer with PrintNode driver.

## 1.1.1 - 2020-07-08

### Changed
- Add method doc blocks to `Printing` facade for `defaultPrinterId()` and `defaultPrinter()`.

## 1.1.0 - 2020-07-07

### Added
- Add support to cast `Printer` to an array or json.

## 1.0.0 - 2020-06-26

- Initial release
